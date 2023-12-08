SELECT premio_apolice(1) AS premio_total;



-----------------------------------------


SELECT co.descricao,co.cobertura_id, c.nome_cliente, MAX(co.premio) AS premio_maximo
FROM cobertura co
JOIN cobertura_apolice ca ON co.cobertura_id = ca.cobertura_id
JOIN apolice_seguro a ON ca.apolice_id = a.apolice_id
JOIN cliente c ON a.cliente_id = c.cliente_id
GROUP BY co.cobertura_id
ORDER BY premio_maximo DESC
LIMIT 1;

-----------------------------------------


select nome_cliente,descricao_sinistro,tipo_imovel
from cliente c inner join apolice_seguro a
on c.cliente_id = a.cliente_id inner join evento_sinistro e
on a.apolice_id = e.apolice_id inner join imovel i
on a.imovel_id = i.imovel_id
where descricao_sinistro = 'Roubo na residência'


-----------------------------------------


SELECT apolice_id
FROM apolice_seguro a
WHERE a.data_termino BETWEEN CURDATE() AND '2024-03-30';