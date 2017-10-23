create view af372.currentSeasonPitchingStats as

SELECT roster.id, FIRST_NM, LAST_NM, FIRST_NM_EN, LAST_NM_EN, SEASON, BACK_NUM, POSITION,
G, W, L, SV, HLD, SO, ER, IP,
round((ER * 7)/(
round((round(IP) +  truncate((IP-round(IP))/0.3, 0) + truncate(IP-round(IP) % 0.3, 1)), 0) +
(truncate(IP-round(IP) % 0.3, 1) * 3) 
), 2) as ERA
from af372.roster inner join af372.pitcher_stats on roster.ID = pitcher_stats.ROSTER_ID 
where SEASON=(select date_format(now(), '%Y') as 'yyyy')
group by ROSTER_ID;