select
	year(created_at) year,
	monthname(created_at) month,
	count(*) published

from articles

group by year, month