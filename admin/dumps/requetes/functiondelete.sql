create or replace function supprproduit(integer) 
returns integer
    
as 
'
	declare 
	  f_id_prod alias for $1;
	  id integer;
	  
	begin
	  select into id idproduit from produit where idproduit=f_id_prod;
	  if not found
	  then
		return 0;
	  else
		delete from produit where idproduit = f_id_prod;
		return 1;
	  end if;
	end;
'
language plpgsql;