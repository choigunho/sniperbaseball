create view af372.totalpitchingstats as 

select roster.id, FIRST_NM, LAST_NM, 
sum(G) as G, sum(W) as W, sum(L) as L, sum(SV) as SV, sum(HLD) as HLD, sum(PA) as PA, sum(AB) as AB, sum(NP) as NP, 
sum(round(IP)) +  truncate((sum(IP)-sum(round(IP)))/0.3, 0) + truncate((sum(IP)-sum(round(IP)))%0.3, 1) as IP,
sum(H) as H, sum(HR) as HR, sum(SH) as SH, sum(SF) as SF, sum(BB) as BB, sum(IBB) as IBB, sum(HBP) as HBP,
sum(SO) as SO, sum(WP) as WP, sum(BK) as BK, sum(R) as R, sum(ER) as ER,

round((sum(ER) * 7)/(
round((sum(round(IP)) +  truncate((sum(IP)-sum(round(IP)))/0.3, 0) + truncate((sum(IP)-sum(round(IP))) % 0.3, 1)), 0) +
(truncate((sum(IP)-sum(round(IP))) % 0.3, 1) * 3) 
), 2) as ERA

from af372.roster inner join af372.pitcher_stats on roster.ID = pitcher_stats.ROSTER_ID group by ID