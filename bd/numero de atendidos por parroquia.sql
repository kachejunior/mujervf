﻿select b.detalle as municipio, count(a.*) as total from mvf_paciente as a, mvf_municipio as b where a.municipio = b.id group by b.detalle 