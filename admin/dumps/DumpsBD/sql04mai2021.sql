--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1
-- Dumped by pg_dump version 13.1

-- Started on 2021-05-04 15:32:41

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA public;


--
-- TOC entry 3063 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 213 (class 1255 OID 41437)
-- Name: is_admin(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.is_admin(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;
begin
	select into id id_admin from bp_admin where login=f_login and password = f_password;
	if not found then
		retour = 0;
	else
		retour=1;
	end if;
	return retour;
end;
';


--
-- TOC entry 215 (class 1255 OID 57807)
-- Name: is_utilisateur(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.is_utilisateur(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;
begin
	select into id idutlisateur from utilisateur where username=f_login and password = f_password;
	if not found then
		retour = 0;
	else
		retour=1;
	end if;
	return retour;
end;
';


--
-- TOC entry 214 (class 1255 OID 57806)
-- Name: is_utilisateurt(text, text); Type: FUNCTION; Schema: public; Owner: -
--

CREATE FUNCTION public.is_utilisateurt(text, text) RETURNS integer
    LANGUAGE plpgsql
    AS '
declare f_pseudo alias for $1;
declare f_mdp alias for $2;
declare id integer;
declare retour integer;
begin
select into id idutlisateur from utilisateur where username = f_pseudo and password = f_mdp;
if not found
then
retour = 0;
else
retour = 1;
end if;
return retour;
end;
';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 212 (class 1259 OID 41427)
-- Name: bp_admin; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.bp_admin (
    id_admin integer NOT NULL,
    login text,
    password text
);


--
-- TOC entry 211 (class 1259 OID 41425)
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.bp_admin_id_admin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3064 (class 0 OID 0)
-- Dependencies: 211
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.bp_admin_id_admin_seq OWNED BY public.bp_admin.id_admin;


--
-- TOC entry 207 (class 1259 OID 33148)
-- Name: categorie; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categorie (
    idcategorie integer NOT NULL,
    nomcategorie text NOT NULL,
    image text
);


--
-- TOC entry 206 (class 1259 OID 33146)
-- Name: categorie_idcategorie_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.categorie_idcategorie_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3065 (class 0 OID 0)
-- Dependencies: 206
-- Name: categorie_idcategorie_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.categorie_idcategorie_seq OWNED BY public.categorie.idcategorie;


--
-- TOC entry 203 (class 1259 OID 33124)
-- Name: facture; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.facture (
    idfacture integer NOT NULL,
    numfacture integer NOT NULL,
    datefac date NOT NULL,
    heure text NOT NULL,
    idutilisateur integer NOT NULL
);


--
-- TOC entry 202 (class 1259 OID 33122)
-- Name: facture_idfacture_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.facture_idfacture_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3066 (class 0 OID 0)
-- Dependencies: 202
-- Name: facture_idfacture_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.facture_idfacture_seq OWNED BY public.facture.idfacture;


--
-- TOC entry 209 (class 1259 OID 33170)
-- Name: panier; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.panier (
    idpanier integer NOT NULL,
    quantite integer NOT NULL,
    dateajout date NOT NULL,
    idfacture integer NOT NULL
);


--
-- TOC entry 208 (class 1259 OID 33168)
-- Name: panier_idpanier_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.panier_idpanier_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3067 (class 0 OID 0)
-- Dependencies: 208
-- Name: panier_idpanier_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.panier_idpanier_seq OWNED BY public.panier.idpanier;


--
-- TOC entry 205 (class 1259 OID 33137)
-- Name: produit; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.produit (
    idproduit integer NOT NULL,
    nomproduit text NOT NULL,
    reference text NOT NULL,
    prix double precision NOT NULL,
    stock integer NOT NULL,
    idcategorie integer NOT NULL,
    photo text,
    description text
);


--
-- TOC entry 204 (class 1259 OID 33135)
-- Name: produit_idproduit_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.produit_idproduit_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3068 (class 0 OID 0)
-- Dependencies: 204
-- Name: produit_idproduit_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.produit_idproduit_seq OWNED BY public.produit.idproduit;


--
-- TOC entry 201 (class 1259 OID 33113)
-- Name: utilisateur; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.utilisateur (
    idutlisateur integer NOT NULL,
    nom text NOT NULL,
    prenom text NOT NULL,
    localite text NOT NULL,
    username text,
    password text,
    date_naissance date
);


--
-- TOC entry 200 (class 1259 OID 33111)
-- Name: utilisateur_idutlisateur_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.utilisateur_idutlisateur_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3069 (class 0 OID 0)
-- Dependencies: 200
-- Name: utilisateur_idutlisateur_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.utilisateur_idutlisateur_seq OWNED BY public.utilisateur.idutlisateur;


--
-- TOC entry 210 (class 1259 OID 33226)
-- Name: vue_produits_cat; Type: VIEW; Schema: public; Owner: -
--

CREATE VIEW public.vue_produits_cat AS
 SELECT produit.idproduit,
    produit.nomproduit,
    produit.photo,
    produit.prix,
    produit.stock,
    produit.reference,
    categorie.idcategorie,
    categorie.nomcategorie
   FROM public.produit,
    public.categorie
  WHERE (produit.idcategorie = categorie.idcategorie);


--
-- TOC entry 2897 (class 2604 OID 41430)
-- Name: bp_admin id_admin; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.bp_admin ALTER COLUMN id_admin SET DEFAULT nextval('public.bp_admin_id_admin_seq'::regclass);


--
-- TOC entry 2895 (class 2604 OID 33151)
-- Name: categorie idcategorie; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie ALTER COLUMN idcategorie SET DEFAULT nextval('public.categorie_idcategorie_seq'::regclass);


--
-- TOC entry 2893 (class 2604 OID 33127)
-- Name: facture idfacture; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.facture ALTER COLUMN idfacture SET DEFAULT nextval('public.facture_idfacture_seq'::regclass);


--
-- TOC entry 2896 (class 2604 OID 33173)
-- Name: panier idpanier; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.panier ALTER COLUMN idpanier SET DEFAULT nextval('public.panier_idpanier_seq'::regclass);


--
-- TOC entry 2894 (class 2604 OID 33140)
-- Name: produit idproduit; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit ALTER COLUMN idproduit SET DEFAULT nextval('public.produit_idproduit_seq'::regclass);


--
-- TOC entry 2892 (class 2604 OID 33116)
-- Name: utilisateur idutlisateur; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur ALTER COLUMN idutlisateur SET DEFAULT nextval('public.utilisateur_idutlisateur_seq'::regclass);


--
-- TOC entry 3057 (class 0 OID 41427)
-- Dependencies: 212
-- Data for Name: bp_admin; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.bp_admin (id_admin, login, password) VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3');


--
-- TOC entry 3053 (class 0 OID 33148)
-- Dependencies: 207
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.categorie (idcategorie, nomcategorie, image) VALUES (1, 'LUXE HOMME', 'image15.png');
INSERT INTO public.categorie (idcategorie, nomcategorie, image) VALUES (3, 'SPORT HOMME', 'image5''.png');
INSERT INTO public.categorie (idcategorie, nomcategorie, image) VALUES (4, 'SPORT FEMME', 'image6''.png');
INSERT INTO public.categorie (idcategorie, nomcategorie, image) VALUES (2, 'LUXE FEMME', 'image16.PNG');


--
-- TOC entry 3049 (class 0 OID 33124)
-- Dependencies: 203
-- Data for Name: facture; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3055 (class 0 OID 33170)
-- Dependencies: 209
-- Data for Name: panier; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- TOC entry 3051 (class 0 OID 33137)
-- Dependencies: 205
-- Data for Name: produit; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (7, 'johnson', 'bracelet en cuir noir', 30.99, 21, 2, 'fl3.png', 'A2');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (9, 'Tommy Hilfiger', 'Montre Daniel', 199.99, 5, 1, 'thomy.png', 'A4');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (10, 'Pierre Lannier', 'Montre en argent', 127, 12, 1, 'piere.png', 'A5');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (11, 'Rolex', 'Montre Lumineuse', 249.99, 15, 1, 'rolex.png', 'A6');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (12, 'Didun', 'Modele en acier inoxydable', 99.99, 8, 1, 'didun.png', 'A7');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (13, 'tommy hilfiger', 'Montre Blake', 199.99, 50, 2, 'fl1.png', 'A8');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (14, 'Cartus', 'Bracelet en Acier noir', 87, 35, 2, 'fl2.png', 'A9');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (15, 'Adidas', 'montre connecté 1.3"  RAM: 512ko
batterie 2500mah bleutooth', 199.99, 50, 3, 'sp1.png', 'A10');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (16, 'Navigation', 'Navigator 1990', 249.99, 50, 3, 'sp2.png', 'A11');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (17, 'Nike', 'Cadran miroir a led adulte', 100.99, 40, 3, 'sp3.png', 'A12');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (18, 'Puma', 'Cadran blanc avec un detail teinté', 49.99, 40, 3, 'sp4.png', 'A13');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (19, 'Addidas', 'Montre Classique', 49.99, 40, 3, 'sp5.png', 'A14');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (20, 'Lorus', 'Bracelet en silicon rose', 49.99, 25, 4, 'sf1.png', 'A15');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (21, 'Udexe', 'Sport fitness tracker d''activité
bracelet intèligent podometre', 40, 25, 4, 'sf2.png', 'A16');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (6, 'Certus', 'Montre urbaine', 155, 100, 1, 'image9''.png', 'A1');
INSERT INTO public.produit (idproduit, nomproduit, reference, prix, stock, idcategorie, photo, description) VALUES (8, 'Casio', 'Acier Noire', 99, 55, 1, 'acier.png', 'A3');


--
-- TOC entry 3047 (class 0 OID 33113)
-- Dependencies: 201
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.utilisateur (idutlisateur, nom, prenom, localite, username, password, date_naissance) VALUES (1, 'test', 'test', 'test', 'test', 'test', '2020-12-10');
INSERT INTO public.utilisateur (idutlisateur, nom, prenom, localite, username, password, date_naissance) VALUES (2, 'client', 'client', 'namur', 'vanel', 'vanel', '2020-02-12');


--
-- TOC entry 3070 (class 0 OID 0)
-- Dependencies: 211
-- Name: bp_admin_id_admin_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.bp_admin_id_admin_seq', 1, true);


--
-- TOC entry 3071 (class 0 OID 0)
-- Dependencies: 206
-- Name: categorie_idcategorie_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.categorie_idcategorie_seq', 6, true);


--
-- TOC entry 3072 (class 0 OID 0)
-- Dependencies: 202
-- Name: facture_idfacture_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.facture_idfacture_seq', 1, false);


--
-- TOC entry 3073 (class 0 OID 0)
-- Dependencies: 208
-- Name: panier_idpanier_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.panier_idpanier_seq', 1, false);


--
-- TOC entry 3074 (class 0 OID 0)
-- Dependencies: 204
-- Name: produit_idproduit_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.produit_idproduit_seq', 22, true);


--
-- TOC entry 3075 (class 0 OID 0)
-- Dependencies: 200
-- Name: utilisateur_idutlisateur_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.utilisateur_idutlisateur_seq', 1, true);


--
-- TOC entry 2911 (class 2606 OID 41435)
-- Name: bp_admin bp_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.bp_admin
    ADD CONSTRAINT bp_admin_pkey PRIMARY KEY (id_admin);


--
-- TOC entry 2907 (class 2606 OID 33156)
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (idcategorie);


--
-- TOC entry 2901 (class 2606 OID 33134)
-- Name: facture facture_numfacture_key; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.facture
    ADD CONSTRAINT facture_numfacture_key UNIQUE (numfacture);


--
-- TOC entry 2903 (class 2606 OID 33132)
-- Name: facture facture_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.facture
    ADD CONSTRAINT facture_pkey PRIMARY KEY (idfacture);


--
-- TOC entry 2909 (class 2606 OID 33175)
-- Name: panier panier_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.panier
    ADD CONSTRAINT panier_pkey PRIMARY KEY (idpanier);


--
-- TOC entry 2905 (class 2606 OID 33145)
-- Name: produit produit_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_pkey PRIMARY KEY (idproduit);


--
-- TOC entry 2899 (class 2606 OID 33121)
-- Name: utilisateur utilisateur_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT utilisateur_pkey PRIMARY KEY (idutlisateur);


--
-- TOC entry 2912 (class 2606 OID 33181)
-- Name: facture facture_idutilisateur_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.facture
    ADD CONSTRAINT facture_idutilisateur_fkey FOREIGN KEY (idutilisateur) REFERENCES public.utilisateur(idutlisateur);


--
-- TOC entry 2914 (class 2606 OID 33201)
-- Name: panier panier_idfacture_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.panier
    ADD CONSTRAINT panier_idfacture_fkey FOREIGN KEY (idfacture) REFERENCES public.facture(idfacture);


--
-- TOC entry 2913 (class 2606 OID 33186)
-- Name: produit produit_idcategorie_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.produit
    ADD CONSTRAINT produit_idcategorie_fkey FOREIGN KEY (idcategorie) REFERENCES public.categorie(idcategorie);


-- Completed on 2021-05-04 15:32:41

--
-- PostgreSQL database dump complete
--

