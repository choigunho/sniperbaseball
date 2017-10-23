create view af372.currentseasonbattingstats as

select roster.id, FIRST_NM, LAST_NM, FIRST_NM_EN, LAST_NM_EN, POSITION,
sum(G) as G, sum(PA) as PA, sum(AB) as AB, sum(R) as R, sum(H) as H, sum(_1B) as _1B, sum(_2B) as _2B, sum(_3B) as _3B, sum(HR) as HR,
sum(RBI) as RBI, sum(SB) as SB, sum(CS) as CS, sum(BB) as BB, sum(IBB) as IBB, sum(HBP) as HBP,
sum(SO) as SO, sum(GDP) as GDP, sum(MH) as MH,
round(sum(H)/sum(AB), 3) as AVG,
round((sum(H) + sum(BB) + sum(HBP))/(sum(AB) + sum(BB) + sum(HBP) + sum(SF)), 3) as OBP,
round((sum(_1B) + sum(_2B)*2 + sum(_3B)*3 + sum(HR)*4)/sum(AB), 3) as SLG
from af372.roster inner join af372.batter_stats on roster.ID = batter_stats.ROSTER_ID 
where SEASON=(select date_format(now(), '%Y') as 'yyyy')
group by ROSTER_ID