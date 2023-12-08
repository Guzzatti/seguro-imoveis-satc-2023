DELIMITER $$

CREATE FUNCTION coberturas_obrigatorias(id_seguradora INT)
RETURNS TABLE
BEGIN
    DECLARE resultado TABLE (
        cobertura_id INT,
        descricao VARCHAR(255),
        premio DECIMAL(12, 2),
        limite_indenizacao DECIMAL(12, 2)
    );

    INSERT INTO resultado (cobertura_id, descricao, premio, limite_indenizacao)
    SELECT cobertura_id, descricao, premio, limite_indenizacao
    FROM cobertura
    WHERE seguradora_id = id_seguradora AND obrigatorio = true;

    RETURN resultado;
END $$

DELIMITER ;

DELIMITER $$

CREATE FUNCTION premio_apolice(id_apolice INT)
RETURNS DECIMAL(12, 2)
BEGIN
    DECLARE resultado DECIMAL(12, 2);
    SELECT resultado = SUM(premio)
    FROM cobertura_apolice ca
    INNER JOIN cobertura c
    ON ca.cobertura_id = c.cobertura_id
    WHERE ca.apolice_id = id_apolice;

    RETURN resultado;
END $$

DELIMITER ;

-- Listar clientes que ainda não quitaram a dívida do apólice em determinada seguradora
DELIMITER $$

CREATE PROCEDURE clientes_com_divida(IN id_seguradora INT)
BEGIN
    SELECT nome_cliente, telefone_cliente, email_cliente,  premio_apolice(a.apolice_id) - sum(valor_pagamento) as 'valor a quitar', data_termino
    from cliente c
    INNER JOIN apolice_seguro a
    ON c.cliente_id = a.cliente_id
    INNER JOIN pagamento p
    ON a.apolice_id = p.apolice_id
    WHERE a.seguradora_id = id_seguradora
    GROUP BY a.apolice_id;
END $$

DELIMITER ;

DELIMITER $$


DELIMITER $$

CREATE TRIGGER insert_sinistro_futuro
BEFORE INSERT ON evento_sinistro
FOR EACH ROW
BEGIN
    IF NEW.data_sinistro > CURDATE() THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Infelizmente a máquina do tempo ainda não foi inventada, logo não é permitido inserir eventos que ainda não aconteceram.';
    END IF;
END $$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER insert_apolice_datas_invertidas
BEFORE INSERT ON apolice_seguro
FOR EACH ROW
BEGIN
    IF NEW.data_inicio > NEW.data_termino THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Não é permitido inserir apólice de seguros que terminam antes de começar.';
    END IF;
END $$

DELIMITER ;
