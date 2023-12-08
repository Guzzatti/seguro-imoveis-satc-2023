CREATE INDEX idx_cobertura ON cobertura (obrigatorio, descricao, premio, limite_indenizacao);
CREATE INDEX idx_pagamento ON pagamento (data_pagamento, valor_pagamento);
CREATE INDEX idx_apolice_seguro ON apolice_seguro (data_termino);
CREATE INDEX idx_evento_sinistro ON evento_sinistro (data_sinistro, descricao_sinistro, valor_sinistro);