select completo.detalle, completo.total as totalcompleto, si.total as totalsi, tq.total as totaltq
from (	(select distinct detalle, count(a.*) as total from mvf_municipio left join mvf_paciente as a on id=a.municipio where a.fecha_atencion >= '23-04-1991' group by detalle) as completo left join
	(select distinct detalle, count(a.*) as total from mvf_municipio left join mvf_paciente as a on id=a.municipio where a.esterilizada = 'si' and a.fecha_atencion >= '23-04-1991' group by detalle) as si
	on completo.detalle=si.detalle) left join
	(select distinct detalle, count(a.*) as total from mvf_municipio left join mvf_paciente as a on id=a.municipio where a.esterilizada = 'tq' and a.fecha_atencion >= '23-04-1991' group by detalle) as tq
	on completo.detalle=tq.detalle