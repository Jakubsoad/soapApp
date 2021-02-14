--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1 (Debian 13.1-1.pgdg100+1)
-- Dumped by pg_dump version 13.1

CREATE DATABASE soap_db;
GRANT ALL PRIVILEGES ON DATABASE soap_db TO postgres;

\c soap_db;

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: body_part; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.body_part (
    id integer NOT NULL,
    name character varying(255) NOT NULL
);


ALTER TABLE public.body_part OWNER TO postgres;

--
-- Name: body_part_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.body_part_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.body_part_id_seq OWNER TO postgres;

--
-- Name: body_sub_parts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.body_sub_parts (
    id integer NOT NULL,
    owner_body_part_id integer,
    name character varying(255) NOT NULL
);


ALTER TABLE public.body_sub_parts OWNER TO postgres;

--
-- Name: body_sub_parts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.body_sub_parts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.body_sub_parts_id_seq OWNER TO postgres;

--
-- Data for Name: body_part; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.body_part (id, name) FROM stdin;
\.


--
-- Data for Name: body_sub_parts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.body_sub_parts (id, owner_body_part_id, name) FROM stdin;
\.


--
-- Name: body_part_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.body_part_id_seq', 3, true);


--
-- Name: body_sub_parts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.body_sub_parts_id_seq', 14, true);


--
-- Name: body_part body_part_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.body_part
    ADD CONSTRAINT body_part_pkey PRIMARY KEY (id);


--
-- Name: body_sub_parts body_sub_parts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.body_sub_parts
    ADD CONSTRAINT body_sub_parts_pkey PRIMARY KEY (id);


--
-- Name: idx_10a20c05a1c830b0; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_10a20c05a1c830b0 ON public.body_sub_parts USING btree (owner_body_part_id);


--
-- Name: body_sub_parts fk_10a20c05a1c830b0; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.body_sub_parts
    ADD CONSTRAINT fk_10a20c05a1c830b0 FOREIGN KEY (owner_body_part_id) REFERENCES public.body_part(id);


--
-- PostgreSQL database dump complete
--

