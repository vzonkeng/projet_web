--drop function is_admin(text,text);
create or replace  function is_utilisateur(text,text) returns integer
as
'
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;
begin
	select into id idutlisateur from utilisateur where pseudo=f_login and mdp = f_password;
	if not found then
		retour = 0;
	else
		retour=1;
	end if;
	return retour;
end;
'
language plpgsql;

select is_utilisateur('vanel','vanel')