create view af372.currentSeasonBattingStats as

SELECT roster.id, FIRST_NM, LAST_NM, FIRST_NM_EN, LAST_NM_EN, SEASON, BACK_NUM, POSITION,
G, R, H, HR, RBI, SB, BB, SO,
round(H/AB, 3) as AVG,
round((H + BB + HBP)/(AB + BB + HBP + SF), 3) as OBP,
round((_1B + _2B*2 + _3B*3 + HR*4)/AB, 3) as SLG
FROM af372.roster inner join af372.batter_stats on roster.ID = batter_stats.ROSTER_ID 
where SEASON=(select date_format(now(), '%Y') as 'yyyy')
group by ROSTER_ID;