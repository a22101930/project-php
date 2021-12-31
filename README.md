# CakePHP Application Skeleton

Por dificuldades de colocar no Cake fizemos os scripts à parte que são:


### Numero de máquinas existentes

#### -- Numero de máquinas existentes
``` sql
SELECT count (*) FROM machine WHERE status_id = 1;
```

#### --Top 10 do Software mais usado, exclui maquinas abatidas

``` sql
select soft.*, count (software_id) as "SoftCount" from gestao_soft gs 
inner join software soft on soft.id = gs.software_id 
inner join machine mac on mac.id = gs.machine_id where mac.status_id = 1 
group by software_id order by SoftCount desc limit 10;

CREATE VIEW top_ten_software_instaled as 
select soft.*, count (software_id) as "SoftCount" from gestao_soft gs 
inner join software soft on soft.id = gs.software_id 
inner join machine mac on mac.id = gs.machine_id where mac.status_id = 1 
group by software_id order by SoftCount desc limit 10;

SELECT * FROM top_ten_software_instaled;
```

