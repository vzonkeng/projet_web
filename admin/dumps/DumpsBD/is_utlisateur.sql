create function is_utlisateur(text,text) returns integer
as
'
	declare f_username alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;
begin
	select into id id_utlisateur from utlisateur where username=f_username and password = f_password;
	if not found then
		retour = 0;
	else
		retour=1;
	end if;
	return retour;
end;
'
language plpgsql;