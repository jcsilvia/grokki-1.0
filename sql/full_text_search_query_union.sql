SELECT * FROM (
SELECT 2 AS 'Order',SourceId,BusinessName, Address, City, State, Zipcode, PhoneNumber, ContactName FROM business_search
     WHERE MATCH (BusinessName,Sic4CodeDescription)
     AGAINST ('Ford' WITH QUERY EXPANSION)
      AND City = 'Fall River'
      AND CategoryId = 5
UNION
SELECT 1 AS 'Order',m.MemberId,m.BusinessName, a.Address1, a.City, a.State, a.Zipcode, a.PhoneNumber, m.UserName
  FROM members m, addresses a, business_categories bc, tags t
  WHERE m.MemberId = a.MemberId
    AND m.MemberId = bc.MemberId
    AND m.MemberId = t.MemberId
    AND m.IsBusiness = 1
    AND bc.CategoryId = 5
    AND a.City = 'Fall River'
    AND MATCH(t.BusinessName,t.Tags)
    AGAINST ('Ford' IN BOOLEAN MODE) -- change to query expansion once we have more data
    ) q1 ORDER BY q1.Order ASC;


