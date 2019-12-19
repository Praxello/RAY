select reportId, title, '{}' as parents, 0 as level from Levels where parentId is NULL

with recursive dndclasses_from_parents as
(
      select id, name, '{}'::int[] as parents, 0 as level
        from dndclasses
       where parent_id is NULL

   union all

      select c.id, c.name, parents || c.parent_id, level+1
        from      dndclasses_from_parents p
             join dndclasses c
               on c.parent_id = p.id
       where not c.id = any(parents)
)
select name, id, parents, level
  from dndclasses_from_parents;

  CALL WITH_EMULATOR(
"EMPLOYEES_EXTENDED","SELECT ID, NAME, MANAGER_ID, 0 AS REPORTS FROM EMPLOYEES
  WHERE ID NOT IN (SELECT MANAGER_ID FROM EMPLOYEES WHERE MANAGER_ID IS NOT NULL)",
"
  SELECT M.ID, M.NAME, M.MANAGER_ID, SUM(1+E.REPORTS) AS REPORTS
  FROM EMPLOYEES M JOIN EMPLOYEES_EXTENDED E ON M.ID=E.MANAGER_ID
  GROUP BY M.ID, M.NAME, M.MANAGER_ID
",
"SELECT * FROM EMPLOYEES_EXTENDED",
0,
""
);
