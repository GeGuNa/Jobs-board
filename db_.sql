--
-- PostgreSQL database dump
--

-- Dumped from database version 12.18 (Ubuntu 12.18-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.18 (Ubuntu 12.18-0ubuntu0.20.04.1)

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
-- Name: hr_job_type; Type: TYPE; Schema: public; Owner: dev
--

CREATE TYPE public.hr_job_type AS ENUM (
    'vip',
    'ordinary'
);


ALTER TYPE public.hr_job_type OWNER TO dev;

--
-- Name: jobstatus; Type: TYPE; Schema: public; Owner: dev
--

CREATE TYPE public.jobstatus AS ENUM (
    'pending',
    'accepted',
    'rejected'
);


ALTER TYPE public.jobstatus OWNER TO dev;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cv_requests; Type: TABLE; Schema: public; Owner: tan
--

CREATE TABLE public.cv_requests (
    id bigint NOT NULL,
    f_name text DEFAULT ''::text,
    s_name text DEFAULT ''::text,
    u_phone text DEFAULT ''::text,
    u_email text DEFAULT ''::text,
    u_addr text DEFAULT ''::text,
    u_country text DEFAULT ''::text,
    u_cover text DEFAULT ''::text,
    u_resume text DEFAULT ''::text,
    u_resume_link text DEFAULT ''::text,
    start_at time without time zone NOT NULL,
    end_at time without time zone NOT NULL,
    user_id bigint DEFAULT '0'::bigint,
    company_id bigint DEFAULT '0'::bigint,
    res_type text DEFAULT 'cv'::text,
    job_id bigint DEFAULT '0'::bigint,
    when_send bigint DEFAULT '0'::bigint
);


ALTER TABLE public.cv_requests OWNER TO tan;

--
-- Name: cv_requests_id_seq; Type: SEQUENCE; Schema: public; Owner: tan
--

CREATE SEQUENCE public.cv_requests_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cv_requests_id_seq OWNER TO tan;

--
-- Name: cv_requests_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tan
--

ALTER SEQUENCE public.cv_requests_id_seq OWNED BY public.cv_requests.id;


--
-- Name: hr_education; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_education (
    id bigint NOT NULL,
    e_name text DEFAULT ''::text,
    e_academy text DEFAULT ''::text,
    e_title text DEFAULT ''::text,
    e_desc text DEFAULT ''::text,
    e_attended_from text DEFAULT ''::text,
    e_attended_to text DEFAULT ''::text,
    user_id bigint NOT NULL,
    when_saved bigint NOT NULL
);


ALTER TABLE public.hr_education OWNER TO dev;

--
-- Name: hr_education_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_education_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_education_id_seq OWNER TO dev;

--
-- Name: hr_education_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_education_id_seq OWNED BY public.hr_education.id;


--
-- Name: hr_job; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_job (
    jid bigint NOT NULL,
    title character varying(1024),
    description text,
    required_skills text DEFAULT ''::text,
    deadline text DEFAULT ''::text,
    category_id bigint DEFAULT '0'::bigint,
    job_type text DEFAULT ''::text,
    salary_type text DEFAULT ''::text,
    min_price bigint,
    max_price bigint,
    jcity text DEFAULT ''::text,
    jcountry text DEFAULT ''::text,
    jstate text DEFAULT ''::text,
    experience text DEFAULT ''::text,
    gendert text DEFAULT ''::text,
    qualifications text DEFAULT ''::text,
    company_id bigint DEFAULT '0'::bigint,
    reg_time date DEFAULT CURRENT_DATE,
    unixtime bigint DEFAULT '0'::bigint,
    jtype public.hr_job_type DEFAULT 'ordinary'::public.hr_job_type,
    email text DEFAULT ''::text,
    languages text DEFAULT ''::text,
    phnnumber text DEFAULT ''::text,
    vacancy_direct_url text DEFAULT ''::text,
    responsibilities text DEFAULT ''::text,
    we_offer text DEFAULT ''::text,
    detailed_qualifications text DEFAULT ''::text,
    benefits text DEFAULT ''::text,
    video_url text DEFAULT ''::text,
    vip_time bigint DEFAULT '0'::bigint,
    ordinary_time bigint DEFAULT '0'::bigint
);


ALTER TABLE public.hr_job OWNER TO dev;

--
-- Name: hr_job_cats; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_job_cats (
    cid bigint NOT NULL,
    name character varying(1024) DEFAULT ''::character varying
);


ALTER TABLE public.hr_job_cats OWNER TO dev;

--
-- Name: hr_job_cats_cid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_job_cats_cid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_job_cats_cid_seq OWNER TO dev;

--
-- Name: hr_job_cats_cid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_job_cats_cid_seq OWNED BY public.hr_job_cats.cid;


--
-- Name: hr_job_jid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_job_jid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_job_jid_seq OWNER TO dev;

--
-- Name: hr_job_jid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_job_jid_seq OWNED BY public.hr_job.jid;


--
-- Name: hr_job_requests; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_job_requests (
    rid bigint NOT NULL,
    by_whom bigint DEFAULT '0'::bigint,
    status_of_requests public.jobstatus DEFAULT 'pending'::public.jobstatus,
    desct_text text DEFAULT ''::text,
    company_id bigint DEFAULT '0'::bigint,
    job_id bigint DEFAULT '0'::bigint,
    reg_time text DEFAULT now(),
    unixtime bigint DEFAULT '0'::bigint
);


ALTER TABLE public.hr_job_requests OWNER TO dev;

--
-- Name: hr_job_requests_rid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_job_requests_rid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_job_requests_rid_seq OWNER TO dev;

--
-- Name: hr_job_requests_rid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_job_requests_rid_seq OWNED BY public.hr_job_requests.rid;


--
-- Name: hr_saved_candidates; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_saved_candidates (
    sid bigint NOT NULL,
    user_id bigint NOT NULL,
    company_id bigint NOT NULL,
    when_saved bigint NOT NULL
);


ALTER TABLE public.hr_saved_candidates OWNER TO dev;

--
-- Name: hr_saved_candidates_sid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_saved_candidates_sid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_saved_candidates_sid_seq OWNER TO dev;

--
-- Name: hr_saved_candidates_sid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_saved_candidates_sid_seq OWNED BY public.hr_saved_candidates.sid;


--
-- Name: hr_saved_jobs; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_saved_jobs (
    jid bigint NOT NULL,
    user_id bigint NOT NULL,
    job_id bigint NOT NULL,
    when_saved bigint NOT NULL
);


ALTER TABLE public.hr_saved_jobs OWNER TO dev;

--
-- Name: hr_saved_jobs_jid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_saved_jobs_jid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_saved_jobs_jid_seq OWNER TO dev;

--
-- Name: hr_saved_jobs_jid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_saved_jobs_jid_seq OWNED BY public.hr_saved_jobs.jid;


--
-- Name: hr_user; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_user (
    uid bigint NOT NULL,
    name character varying(1024) DEFAULT ''::character varying,
    surn character varying(1024) DEFAULT ''::character varying,
    password character varying(1024) DEFAULT ''::character varying,
    mobnumber character varying(1024) DEFAULT ''::character varying,
    pemail character varying(1024) DEFAULT ''::character varying,
    reg_time text DEFAULT now(),
    company_id bigint DEFAULT '0'::bigint,
    unixtime bigint DEFAULT '0'::bigint,
    birth_yy bigint DEFAULT '0'::bigint,
    birth_mm bigint DEFAULT '0'::bigint,
    birth_dd bigint DEFAULT '0'::bigint,
    gender character varying(100) DEFAULT 'none'::character varying,
    user_type character varying(100) DEFAULT 'candidate'::character varying,
    compname character varying(1024) DEFAULT ''::character varying,
    website character varying(1024) DEFAULT ''::character varying,
    sector character varying(1024) DEFAULT ''::character varying,
    aboutcompany text DEFAULT ''::text,
    country character varying(1024) DEFAULT ''::character varying,
    state character varying(1024) DEFAULT ''::character varying,
    city character varying(1024) DEFAULT ''::character varying,
    postalindex character varying(1024) DEFAULT ''::character varying,
    fulladdress text DEFAULT ''::text,
    photo_id bigint DEFAULT '0'::bigint,
    photo_type character varying(1024) DEFAULT ''::character varying,
    facebook character varying(1024) DEFAULT ''::character varying,
    twitter character varying(1024) DEFAULT ''::character varying,
    linkedin character varying(1024) DEFAULT ''::character varying,
    dribble character varying(1024) DEFAULT ''::character varying,
    photo_addr text DEFAULT ''::text,
    instagram character varying(1024) DEFAULT ''::character varying,
    tiktok character varying(1024) DEFAULT ''::character varying,
    languages character varying(1024) DEFAULT ''::character varying,
    qualification character varying(1024) DEFAULT ''::character varying,
    experience character varying(1024) DEFAULT ''::character varying,
    capability text DEFAULT ''::text,
    founded character varying(1024) DEFAULT ''::character varying,
    viewed bigint DEFAULT '0'::bigint,
    cover_pic character varying(1024) DEFAULT ''::character varying,
    ad_pic character varying(1024) DEFAULT ''::character varying,
    ad_pic_url character varying(1024) DEFAULT ''::character varying,
    package_type character varying(100) DEFAULT 'none'::character varying
);


ALTER TABLE public.hr_user OWNER TO dev;

--
-- Name: hr_user1; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_user1 (
    uid bigint NOT NULL,
    name character varying(1024) DEFAULT ''::character varying,
    surn character varying(1024) DEFAULT ''::character varying,
    password character varying(1024) DEFAULT ''::character varying,
    mobnumber character varying(1024) DEFAULT ''::character varying,
    pemail character varying(1024) DEFAULT ''::character varying,
    reg_time date DEFAULT now(),
    reg_time2 text DEFAULT now(),
    company_id bigint DEFAULT '0'::bigint,
    unixtime bigint DEFAULT '0'::bigint,
    birth_yy bigint DEFAULT '0'::bigint,
    birth_mm bigint DEFAULT '0'::bigint,
    birth_dd bigint DEFAULT '0'::bigint
);


ALTER TABLE public.hr_user1 OWNER TO dev;

--
-- Name: hr_user12; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_user12 (
    uid bigint NOT NULL,
    name character varying(1024) DEFAULT ''::character varying,
    surn character varying(1024) DEFAULT ''::character varying,
    password character varying(1024) DEFAULT ''::character varying,
    mobnumber character varying(1024) DEFAULT ''::character varying,
    pemail character varying(1024) DEFAULT ''::character varying,
    reg_time date DEFAULT now(),
    company_id bigint DEFAULT '0'::bigint,
    unixtime bigint DEFAULT '0'::bigint,
    birth_yy bigint DEFAULT '0'::bigint,
    birth_mm bigint DEFAULT '0'::bigint,
    birth_dd bigint DEFAULT '0'::bigint
);


ALTER TABLE public.hr_user12 OWNER TO dev;

--
-- Name: hr_user122; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_user122 (
    uid bigint NOT NULL,
    name character varying(1024) DEFAULT ''::character varying,
    surn character varying(1024) DEFAULT ''::character varying,
    password character varying(1024) DEFAULT ''::character varying,
    mobnumber character varying(1024) DEFAULT ''::character varying,
    pemail character varying(1024) DEFAULT ''::character varying,
    reg_time date DEFAULT now(),
    reg_time2 text DEFAULT now(),
    company_id bigint DEFAULT '0'::bigint,
    unixtime bigint DEFAULT '0'::bigint,
    birth_yy bigint DEFAULT '0'::bigint,
    birth_mm bigint DEFAULT '0'::bigint,
    birth_dd bigint DEFAULT '0'::bigint
);


ALTER TABLE public.hr_user122 OWNER TO dev;

--
-- Name: hr_user122_uid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_user122_uid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_user122_uid_seq OWNER TO dev;

--
-- Name: hr_user122_uid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_user122_uid_seq OWNED BY public.hr_user122.uid;


--
-- Name: hr_user12_uid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_user12_uid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_user12_uid_seq OWNER TO dev;

--
-- Name: hr_user12_uid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_user12_uid_seq OWNED BY public.hr_user12.uid;


--
-- Name: hr_user1_uid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_user1_uid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_user1_uid_seq OWNER TO dev;

--
-- Name: hr_user1_uid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_user1_uid_seq OWNED BY public.hr_user1.uid;


--
-- Name: hr_user_sessions; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_user_sessions (
    session_id bigint NOT NULL,
    whenlogged character varying(360) NOT NULL,
    hash character varying(360) NOT NULL,
    user_id bigint NOT NULL,
    time_limit bigint NOT NULL,
    date_auth bigint NOT NULL
);


ALTER TABLE public.hr_user_sessions OWNER TO dev;

--
-- Name: hr_user_sessions_session_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_user_sessions_session_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_user_sessions_session_id_seq OWNER TO dev;

--
-- Name: hr_user_sessions_session_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_user_sessions_session_id_seq OWNED BY public.hr_user_sessions.session_id;


--
-- Name: hr_user_skills; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_user_skills (
    id bigint NOT NULL,
    e_skillname text DEFAULT ''::text,
    e_percentage text DEFAULT ''::text,
    user_id bigint NOT NULL,
    when_saved bigint NOT NULL
);


ALTER TABLE public.hr_user_skills OWNER TO dev;

--
-- Name: hr_user_skills_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_user_skills_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_user_skills_id_seq OWNER TO dev;

--
-- Name: hr_user_skills_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_user_skills_id_seq OWNED BY public.hr_user_skills.id;


--
-- Name: hr_user_uid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_user_uid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_user_uid_seq OWNER TO dev;

--
-- Name: hr_user_uid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_user_uid_seq OWNED BY public.hr_user.uid;


--
-- Name: hr_userworkstory; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.hr_userworkstory (
    id bigint NOT NULL,
    e_companyname text DEFAULT ''::text,
    e_title text DEFAULT ''::text,
    e_desc text DEFAULT ''::text,
    e_timefrom text DEFAULT ''::text,
    e_timeto text DEFAULT ''::text,
    user_id bigint NOT NULL,
    when_saved bigint NOT NULL
);


ALTER TABLE public.hr_userworkstory OWNER TO dev;

--
-- Name: hr_userworkstory_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.hr_userworkstory_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hr_userworkstory_id_seq OWNER TO dev;

--
-- Name: hr_userworkstory_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.hr_userworkstory_id_seq OWNED BY public.hr_userworkstory.id;


--
-- Name: kuku1; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.kuku1 (
    id integer,
    name character varying(32)
);


ALTER TABLE public.kuku1 OWNER TO dev;

--
-- Name: kuku31; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.kuku31 (
    id integer,
    name character varying(32)
);


ALTER TABLE public.kuku31 OWNER TO dev;

--
-- Name: s_test132; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.s_test132 (
    id bigint NOT NULL,
    name character varying(1024),
    surn character varying(1024),
    birth_yy bigint DEFAULT 0,
    birth_mm bigint DEFAULT 0,
    birth_dd bigint DEFAULT 0
);


ALTER TABLE public.s_test132 OWNER TO dev;

--
-- Name: s_test1321; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.s_test1321 (
    id bigint NOT NULL,
    name character varying(1024),
    surn character varying(1024),
    birth_yy bigint DEFAULT 0,
    birth_mm bigint DEFAULT 0,
    birth_dd bigint DEFAULT 0
);


ALTER TABLE public.s_test1321 OWNER TO dev;

--
-- Name: s_test1321_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.s_test1321_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.s_test1321_id_seq OWNER TO dev;

--
-- Name: s_test1321_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.s_test1321_id_seq OWNED BY public.s_test1321.id;


--
-- Name: s_test132_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.s_test132_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.s_test132_id_seq OWNER TO dev;

--
-- Name: s_test132_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.s_test132_id_seq OWNED BY public.s_test132.id;


--
-- Name: s_test13321; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.s_test13321 (
    id bigint NOT NULL,
    name character varying(1024),
    surn character varying(1024),
    birth_yy bigint DEFAULT 0,
    birth_mm bigint DEFAULT 0,
    birth_dd bigint DEFAULT 0
);


ALTER TABLE public.s_test13321 OWNER TO dev;

--
-- Name: s_test133213; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.s_test133213 (
    id bigint NOT NULL,
    name character varying(1024),
    surn character varying(1024),
    birth_yy bigint DEFAULT 0,
    birth_mm bigint DEFAULT 0,
    birth_dd bigint DEFAULT 0
);


ALTER TABLE public.s_test133213 OWNER TO dev;

--
-- Name: s_test133213_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.s_test133213_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.s_test133213_id_seq OWNER TO dev;

--
-- Name: s_test133213_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.s_test133213_id_seq OWNED BY public.s_test133213.id;


--
-- Name: s_test13321_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.s_test13321_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.s_test13321_id_seq OWNER TO dev;

--
-- Name: s_test13321_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.s_test13321_id_seq OWNED BY public.s_test13321.id;


--
-- Name: s_user; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.s_user (
    uid bigint NOT NULL,
    name character varying(1024) DEFAULT ''::character varying,
    surn character varying(1024) DEFAULT ''::character varying,
    password character varying(1024) DEFAULT ''::character varying,
    mobnumber character varying(1024) DEFAULT ''::character varying,
    pemail character varying(1024) DEFAULT ''::character varying,
    reg_time date DEFAULT CURRENT_DATE,
    unixtime bigint DEFAULT '0'::bigint,
    birth_yy bigint DEFAULT '0'::bigint,
    birth_mm bigint DEFAULT '0'::bigint,
    birth_dd bigint DEFAULT '0'::bigint
);


ALTER TABLE public.s_user OWNER TO dev;

--
-- Name: s_user1z; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.s_user1z (
    uid bigint NOT NULL,
    name character varying(1024) DEFAULT ''::character varying,
    surn character varying(1024) DEFAULT ''::character varying,
    password character varying(1024) DEFAULT ''::character varying,
    mobnumber character varying(1024) DEFAULT ''::character varying,
    pemail character varying(1024) DEFAULT ''::character varying,
    reg_time date DEFAULT CURRENT_DATE,
    unixtime bigint DEFAULT '0'::bigint,
    birth_yy bigint DEFAULT '0'::bigint,
    birth_mm bigint DEFAULT '0'::bigint,
    birth_dd bigint DEFAULT '0'::bigint
);


ALTER TABLE public.s_user1z OWNER TO dev;

--
-- Name: s_user1z_uid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.s_user1z_uid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.s_user1z_uid_seq OWNER TO dev;

--
-- Name: s_user1z_uid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.s_user1z_uid_seq OWNED BY public.s_user1z.uid;


--
-- Name: s_user_uid_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.s_user_uid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.s_user_uid_seq OWNER TO dev;

--
-- Name: s_user_uid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.s_user_uid_seq OWNED BY public.s_user.uid;


--
-- Name: test1; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.test1 (
    id bigint NOT NULL,
    name character varying(1024),
    surn character varying(1024),
    birth_yy bigint DEFAULT 0,
    birth_mm bigint DEFAULT 0,
    birth_dd bigint DEFAULT 0
);


ALTER TABLE public.test1 OWNER TO dev;

--
-- Name: test132; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.test132 (
    id bigint NOT NULL,
    name character varying(1024),
    surn character varying(1024),
    birth_yy bigint DEFAULT 0,
    birth_mm bigint DEFAULT 0,
    birth_dd bigint DEFAULT 0
);


ALTER TABLE public.test132 OWNER TO dev;

--
-- Name: test132_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.test132_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.test132_id_seq OWNER TO dev;

--
-- Name: test132_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.test132_id_seq OWNED BY public.test132.id;


--
-- Name: test1_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.test1_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.test1_id_seq OWNER TO dev;

--
-- Name: test1_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.test1_id_seq OWNED BY public.test1.id;


--
-- Name: user_cvs; Type: TABLE; Schema: public; Owner: tan
--

CREATE TABLE public.user_cvs (
    id bigint NOT NULL,
    user_id bigint DEFAULT '0'::bigint,
    uploaded date DEFAULT CURRENT_DATE,
    updated date DEFAULT CURRENT_DATE,
    resume text DEFAULT ''::text
);


ALTER TABLE public.user_cvs OWNER TO tan;

--
-- Name: user_cvs_id_seq; Type: SEQUENCE; Schema: public; Owner: tan
--

CREATE SEQUENCE public.user_cvs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_cvs_id_seq OWNER TO tan;

--
-- Name: user_cvs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tan
--

ALTER SEQUENCE public.user_cvs_id_seq OWNED BY public.user_cvs.id;


--
-- Name: uzer; Type: TABLE; Schema: public; Owner: dev
--

CREATE TABLE public.uzer (
    id bigint NOT NULL,
    name character varying(32)
);


ALTER TABLE public.uzer OWNER TO dev;

--
-- Name: uzer_id_seq; Type: SEQUENCE; Schema: public; Owner: dev
--

CREATE SEQUENCE public.uzer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.uzer_id_seq OWNER TO dev;

--
-- Name: uzer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev
--

ALTER SEQUENCE public.uzer_id_seq OWNED BY public.uzer.id;


--
-- Name: cv_requests id; Type: DEFAULT; Schema: public; Owner: tan
--

ALTER TABLE ONLY public.cv_requests ALTER COLUMN id SET DEFAULT nextval('public.cv_requests_id_seq'::regclass);


--
-- Name: hr_education id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_education ALTER COLUMN id SET DEFAULT nextval('public.hr_education_id_seq'::regclass);


--
-- Name: hr_job jid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_job ALTER COLUMN jid SET DEFAULT nextval('public.hr_job_jid_seq'::regclass);


--
-- Name: hr_job_cats cid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_job_cats ALTER COLUMN cid SET DEFAULT nextval('public.hr_job_cats_cid_seq'::regclass);


--
-- Name: hr_job_requests rid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_job_requests ALTER COLUMN rid SET DEFAULT nextval('public.hr_job_requests_rid_seq'::regclass);


--
-- Name: hr_saved_candidates sid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_saved_candidates ALTER COLUMN sid SET DEFAULT nextval('public.hr_saved_candidates_sid_seq'::regclass);


--
-- Name: hr_saved_jobs jid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_saved_jobs ALTER COLUMN jid SET DEFAULT nextval('public.hr_saved_jobs_jid_seq'::regclass);


--
-- Name: hr_user uid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user ALTER COLUMN uid SET DEFAULT nextval('public.hr_user_uid_seq'::regclass);


--
-- Name: hr_user1 uid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user1 ALTER COLUMN uid SET DEFAULT nextval('public.hr_user1_uid_seq'::regclass);


--
-- Name: hr_user12 uid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user12 ALTER COLUMN uid SET DEFAULT nextval('public.hr_user12_uid_seq'::regclass);


--
-- Name: hr_user122 uid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user122 ALTER COLUMN uid SET DEFAULT nextval('public.hr_user122_uid_seq'::regclass);


--
-- Name: hr_user_sessions session_id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user_sessions ALTER COLUMN session_id SET DEFAULT nextval('public.hr_user_sessions_session_id_seq'::regclass);


--
-- Name: hr_user_skills id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user_skills ALTER COLUMN id SET DEFAULT nextval('public.hr_user_skills_id_seq'::regclass);


--
-- Name: hr_userworkstory id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_userworkstory ALTER COLUMN id SET DEFAULT nextval('public.hr_userworkstory_id_seq'::regclass);


--
-- Name: s_test132 id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_test132 ALTER COLUMN id SET DEFAULT nextval('public.s_test132_id_seq'::regclass);


--
-- Name: s_test1321 id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_test1321 ALTER COLUMN id SET DEFAULT nextval('public.s_test1321_id_seq'::regclass);


--
-- Name: s_test13321 id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_test13321 ALTER COLUMN id SET DEFAULT nextval('public.s_test13321_id_seq'::regclass);


--
-- Name: s_test133213 id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_test133213 ALTER COLUMN id SET DEFAULT nextval('public.s_test133213_id_seq'::regclass);


--
-- Name: s_user uid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_user ALTER COLUMN uid SET DEFAULT nextval('public.s_user_uid_seq'::regclass);


--
-- Name: s_user1z uid; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_user1z ALTER COLUMN uid SET DEFAULT nextval('public.s_user1z_uid_seq'::regclass);


--
-- Name: test1 id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.test1 ALTER COLUMN id SET DEFAULT nextval('public.test1_id_seq'::regclass);


--
-- Name: test132 id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.test132 ALTER COLUMN id SET DEFAULT nextval('public.test132_id_seq'::regclass);


--
-- Name: user_cvs id; Type: DEFAULT; Schema: public; Owner: tan
--

ALTER TABLE ONLY public.user_cvs ALTER COLUMN id SET DEFAULT nextval('public.user_cvs_id_seq'::regclass);


--
-- Name: uzer id; Type: DEFAULT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.uzer ALTER COLUMN id SET DEFAULT nextval('public.uzer_id_seq'::regclass);


--
-- Data for Name: cv_requests; Type: TABLE DATA; Schema: public; Owner: tan
--

COPY public.cv_requests (id, f_name, s_name, u_phone, u_email, u_addr, u_country, u_cover, u_resume, u_resume_link, start_at, end_at, user_id, company_id, res_type, job_id, when_send) FROM stdin;
15	eeqwe1232	222222	1123123123	weqwe@gmail.com	Agmashenebeli	Georgia	qqqqqqq	6		01:09:15	01:09:15	16	21	cv	0	0
16	1111111211	222222	3333333333	qwe@qwe.ru3	Agmashenebeli	Georgia	zzzzzzzzzzzzzzz	6		01:09:15	01:09:15	16	21	cv	0	0
19	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	ggggggg	6		01:09:15	01:09:15	16	21	request	21	0
20	new	new	124124124	new@gmail.com	agmashenebeli	batumi,Georgia	qwqqqqqqqqqqqqqqqqq	6		01:09:15	01:09:15	16	21	cv	0	0
21	qqq	qqqqqqqqqq	+995555 92 27 02	weqwe@gmail.com	wwwwww	qqaaaaaaaaaaaaaaaa	cccccccccccccccccccccccccc	6		01:09:15	01:09:15	16	13	request	19	0
22	wwww	qweqweqwe	+1555922702	geguna27@gmail.com	qweqwe	qweqwe	qweqwe	7		01:09:15	01:09:15	22	13	request	16	0
23	wwww	qweqweqwe	+1555922702	geguna27@gmail.com	qweqwe	qweqwe	qweqwe	7		01:09:15	01:09:15	22	13	request	16	0
24	wwww	qweqweqwe	+1555922702	geguna27@gmail.com	qweqwe	qweqwe	qweqwe	7		01:09:15	01:09:15	22	13	request	16	0
25	wwww	qweqweqwe	+1555922702	geguna27@gmail.com	qweqwe	qweqwe	qweqwe	7		01:09:15	01:09:15	22	13	request	16	0
26	wwww	qweqweqwe	+1555922702	geguna27@gmail.com	qweqwe	qweqwe	qweqwe	7		01:09:15	01:09:15	22	13	request	16	0
27	wwww	qweqweqwe	+1555922702	geguna27@gmail.com	qweqwe	qweqwe	qweqwe	7		01:09:15	01:09:15	22	13	request	16	0
28	wwww	qweqweqwe	+1555922702	geguna27@gmail.com	qweqwe	qweqwe	qweqwe	7		01:09:15	01:09:15	22	13	request	16	0
29	wwww	qweqweqwe	+1555922702	geguna27@gmail.com	qweqwe	qweqwe	qweqwe	7		01:09:15	01:09:15	22	13	request	16	0
30	wwww	qweqweqwe	+1555922702	geguna27@gmail.com	qweqwe	qweqwe	qweqwe	7		01:09:15	01:09:15	22	13	request	16	0
31	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeee	7		01:09:15	01:09:15	22	23	cv	0	0
32	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeee	7		01:09:15	01:09:15	22	23	cv	0	0
33	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeee	7		01:09:15	01:09:15	22	23	cv	0	0
34	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeee	7		01:09:15	01:09:15	22	23	cv	0	0
35	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeee	7		01:09:15	01:09:15	22	23	cv	0	0
36	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeee	7		01:09:15	01:09:15	22	23	cv	0	0
37	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeee	7		01:09:15	01:09:15	22	23	cv	0	0
38	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeee	7		01:09:15	01:09:15	22	23	cv	0	0
39	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeee	7		01:09:15	01:09:15	22	23	cv	0	0
40	eeqwe123	qweqweqwe	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeee	7		01:09:15	01:09:15	22	23	cv	0	0
41	eeqwe123	222222222	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	33333333333333333333333333	7		01:09:15	01:09:15	22	23	request	22	0
42	222222222	333333333333	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	444444444	7		01:09:15	01:09:15	22	23	request	22	0
43	222222222	333333333333	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	444444444	7		01:09:15	01:09:15	22	23	request	22	0
44	222222222	333333333333	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	444444444	7		01:09:15	01:09:15	22	23	request	22	0
45	222222222	333333333333	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	444444444	7		01:09:15	01:09:15	22	23	request	22	0
46	222222222	333333333333	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	444444444	7		01:09:15	01:09:15	22	23	request	22	0
47	222222222	333333333333	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	444444444	7		01:09:15	01:09:15	22	23	request	22	0
48	222222222	333333333333	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	444444444	7		01:09:15	01:09:15	22	23	request	22	0
49	222222222	333333333333	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	444444444	7		01:09:15	01:09:15	22	23	request	22	0
50	eeeee	213123	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	qqqqqqqq	10		01:09:15	01:09:15	24	13	request	16	0
51	eeeee	213123	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	qqqqqqqqwwwwww	9		01:09:15	01:09:15	24	13	request	16	0
52	eeeee	213123	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	qqqqqqqqwwwwww	8		01:09:15	01:09:15	24	13	request	16	0
53	qqqqq	qqqqqqq	+1555922702	geguna27@gmail.com	Agmashenebeli	Georgia	eeeeeeeeee	6		01:09:15	01:09:15	16	23	cv	0	1720126833
54	111111111	2222222	124124124	qweq@dqwe.com	qweqweqwe	11111111	222222222222222222222222	6		01:09:15	01:09:15	16	23	cv	0	1720126970
55	eeqwe123	qweqweqwe	+1555922702	geotwip@gmail.com	Agmashenebeli	Georgia	wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww	6		01:09:15	01:09:15	16	13	request	19	1720127192
56	wwww	qweqweqwe	+995592859449	geotwip@gmail.com	Agmashenebeli	Georgia	wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww	6		01:09:15	01:09:15	16	23	request	22	1720127251
\.


--
-- Data for Name: hr_education; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_education (id, e_name, e_academy, e_title, e_desc, e_attended_from, e_attended_to, user_id, when_saved) FROM stdin;
2		Tbilisis უნივერსიტეტი	პროგრამირება	პროგრამირება php,ruby,math,networking,business and etc etc	2000	2004	3	1708285852
\.


--
-- Data for Name: hr_job; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_job (jid, title, description, required_skills, deadline, category_id, job_type, salary_type, min_price, max_price, jcity, jcountry, jstate, experience, gendert, qualifications, company_id, reg_time, unixtime, jtype, email, languages, phnnumber, vacancy_direct_url, responsibilities, we_offer, detailed_qualifications, benefits, video_url, vip_time, ordinary_time) FROM stdin;
1	წწწწწწწწწწწწწწ	ქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქწ			4	3	1	15	124123	ბათუმი	საქართველო	აჭარა	1	2	3	14	2024-02-15	1708013078	ordinary										0	0
2	axali	agwera			14	3	3	15	1500	ბათუმი	საქართველო	აჭარა	4	1	3	14	2024-02-15	1708013904	ordinary										0	0
3	აწწწწწ	წწწწწწწწწწწწწ			18	2	1	10	5555	ბათუმი	საქართველო	აჭარა	4	2	5	12	2024-02-17	1708194108	ordinary										0	0
4	gogo	bbbbbbbbbbbbbbbbbbbbbbbbbbbbbb			13	3	2	1000	2000	თბილისი	საქართველო	თბილისი	3	1	4	14	2024-02-18	1708253235	ordinary										0	0
5	გოგო2	აწწწწწწწწწწწ			1	1	2	1000	5000	ბათუმი	საქართველო	აჭარა	4	2	5	14	2024-02-18	1708254148	ordinary	ebe@gmail.com	georgian,english,russian	555123456	http://gega.com						0	0
6	გოგო2	აწწწწწწწწწწწ			1	1	2	1000	5000	ბათუმი	საქართველო	აჭარა	2	2	5	14	2024-02-18	1708254423	ordinary	ebe@gmail.com	georgian,english,russian	555123456	http://gega.com						0	0
7	გოგო2	აწწწწწწწწწწწ			1	1	2	1000	5000	ბათუმი	საქართველო	აჭარა	3	2	5	14	2024-02-18	1708254481	ordinary	ebe@gmail.com	georgian,english,russian	555123456	http://gega.com						0	0
8	გოგო2333333333	აწწწწწწწწწწწ			1	1	2	1000	5000	ბათუმი	საქართველო	აჭარა	5	2	5	14	2024-02-18	1708254494	ordinary	ebe@gmail.com	georgian,english,russian	555123456	http://gega.com						0	0
9	გოგო2333333333	აწწწწწწწწწწწ			1	1	2	1000	5000	ბათუმი	საქართველო	აჭარა	5	2	5	14	2024-02-18	1708254803	ordinary	ebe@gmail.com	georgian,english,russian	555123456							0	0
10	სსსსსს	ქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქ			1	1	1	50	200	ბათუმი	საქართველო	აჭარა	2	2	4	6	2024-02-18	1708262589	ordinary	admin@buhaha.com	ქართული,ინგლისური	555112233	vacancy.com	პროგრამირება,ტესტინგი,ბუჰაჰა,ხალხზე დახმარება	დაზღვევას,ბლაბლას, გათობას, სპორტ დარბაზს	1 წელი გამოცდილება პროგრამირებაში, PHP-ს ცოდნა, Ruby's ცოდნა	ყავა,ჩაი,ცივი კოლა,ნამცხვარი		0	0
11	awwwwwwwwwwww	qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq			14	4	2	1	4100	ბათუმი	საქართველო	აჭარა	2	1	1	6	2024-02-18	1708264926	ordinary	admin@buhaha.com		555112233	vacancy.com	qweqweqwe,\r\nqweqweqw,qwe,\r\nqweqweqwe	qweqweqweqwe	qweqwe,qweqw,2222,333	ყავა,ჩაი,ცივი კოლა,ნამცხვარი	https://www.youtube.com/watch?v=lLEf879oTz0	0	0
12	qqqqqq	qqqqqqqqqqqqqqq			4	4	2	10	55000	ბათუმი	საქართველო	აჭარა	3	1	3	6	2024-02-18	1708266840	ordinary	admin@buhaha.com	ქართული,ინგლისური	555112233	aba.com	qweqweq,qweqweqwe,qweqwe	1111111111,2222222222222,33333333	php,ruiby,perl	ყავა,ჩაი,ცივი კოლა,ნამცხვარი	https://www.youtube.com/watch?v=lLEf879oTz0	0	0
13	ნეწ	qqqqqqqqqqqqqqq			4	4	2	10	55000	ბათუმი	საქართველო	აჭარა	3	1	3	6	2024-02-18	1708266848	ordinary	admin@buhaha.com	ქართული,ინგლისური	555112233	aba.com	qweqweq,qweqweqwe,qweqwe	1111111111,2222222222222,33333333	php,ruiby,perl	ყავა,ჩაი,ცივი კოლა,ნამცხვარი	https://www.youtube.com/watch?v=lLEf879oTz0	0	0
14	ნეწ	ქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქ			4	4	2	10	55000	ბათუმი	საქართველო	აჭარა	3	1	3	6	2024-02-18	1708266862	ordinary	admin@buhaha.com	ქართული,ინგლისური	555112233	aba.com	qweqweq,qweqweqwe,qweqwe	1111111111,2222222222222,33333333	php,ruiby,perl	ყავა,ჩაი,ცივი კოლა,ნამცხვარი	https://www.youtube.com/watch?v=lLEf879oTz0	0	0
15	ახალიი	ქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქ			4	4	2	10	55000	ბათუმი	საქართველო	აჭარა	3	1	3	6	2024-02-18	1708266868	ordinary	admin@buhaha.com	ქართული,ინგლისური	555112233	aba.com	qweqweq,qweqweqwe,qweqwe	1111111111,2222222222222,33333333	php,ruiby,perl	ყავა,ჩაი,ცივი კოლა,ნამცხვარი	https://www.youtube.com/watch?v=lLEf879oTz0	0	0
16	კეკსსსს	ქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქ			4	3	2	10	500	ბათუმი	საქართველო	აჭარა	3	1	5	13	2024-02-21	1708462267	vip	admin@buhaha.com	ქართული,ინგლისური	555112233	aba.com	php,ruby,perl	coffe,tea,watermelon,shawarma	blabla,bla12313,qqqq		https://www.youtube.com/watch?v=lLEf879oTz0	0	0
17	php დეველოპერი	ქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქ			4	3	2	10	500	ბათუმი	საქართველო	აჭარა	3	1	5	13	2024-02-21	1708462658	vip	admin@buhaha.com	ქართული,ინგლისური	555112233	aba.com	php,ruby,perl	coffe,tea,watermelon,shawarma	blabla,bla12313,qqqq		https://www.youtube.com/watch?v=lLEf879oTz0	0	0
18	Ruby დეველოპერი	ქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქ			4	3	2	10	500	ბათუმი	საქართველო	აჭარა	3	1	5	13	2024-02-21	1708462665	vip	admin@buhaha.com	ქართული,ინგლისური	555112233	aba.com	php,ruby,perl	coffe,tea,watermelon,shawarma	blabla,bla12313,qqqq		https://www.youtube.com/watch?v=lLEf879oTz0	0	0
19	Ruby დეველოპერი21	ქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქქ			4	3	2	10	500	ბათუმი	საქართველო	აჭარა	4	1	5	13	2024-02-21	1708462949	vip	admin@buhaha.com	ქართული,ინგლისური	555112233	aba.com	php,ruby,perl	coffe,tea,watermelon,shawarma	blabla,bla12313,qqqq		https://www.youtube.com/watch?v=lLEf879oTz0	0	0
20	C++ dev	qqqqqqqqq			12	4	1	100	500	Batumi	Georgia	adjara	4	1	4	21	2024-07-01	1719837133	ordinary	gegun29@gmail.com	Russian,Georgian,English	555998877	Georgia,Batumi  	qweqwe,\r\nqweqwe,\r\nqweqwe	yava,\r\nchay,vqeqwe,qweqw,qweqwe,qwe	qweqwe,qweqwe,qwe,qweqweqwe,qweqwe	coffe,int,mobile,phone		0	0
21	qweqweqweqwe	eeeeeeeee			3	2	1	10	500	Batumi	Georgia	adjara	4	2	2	21	2024-07-01	1719837289	ordinary	geguna27qwe@gmaol.com	georgian		georgia batumi	wwwwwww,qweqwe,qweqweqwe,qweqwe	qweqwe,qweqweqwe,qweqweqwe,qwqwe	qweqw,qweqwe,qweqweqwe,qwe	qweqweqweqwe		0	0
22	qqqq	wwwwwwww			13	4	3	1100	5000	Batumi	Georgia	qqqqqq	3	2	3	23	2024-07-01	1719850036	ordinary	qweqwe@gmail.com	qweqweqwe		qweqweqw	eeeeeeeeeeeee	eeeeeeeeeeeeeee	eeeeeeeeeeeeeeee	qweqwe,qweqw		0	0
23	TitleTitleTitleTitleTitleTitle	DescriptionDescriptionDescriptionDescriptionDescription			13	1	2	1000	1500	Batumi	Georgia	adjara	4	2	4	23	2024-07-04	1720101950	vip	ggg@gmail.com	georgian,english,russian	995123456789	( Another url for this job (not necessary) ).com	DutiesDutiesDutiesDutiesDuties,DutiesDutiesDuties,DutiesDutiesDuties	We offer\r\n,We offer\r\n,We offer\r\n,We offer\r\n,We offer\r\n,We offer\r\n	Detailed qualifications\r\n,Detailed qualifications\r\nDetailed qualifications\r\n,Detailed qualifications\r\n,Detailed qualifications\r\n,Detailed qualifications\r\n	Benefits,Benefits,Benefits,Benefits,Benefits	Video url (iframe link).com	0	0
24	qweqwe	qweqweq			14	3	3	10	1000	Batumi	Georgia	qqqqqq	3	2	2	23	2024-07-06	1720279958	ordinary	qweqwe@gmail.com	georgian,english,russian	124124124124		qqqqqqqqq,eqweqwe	qqqqqqqqq,eqweqwe	qqqqqqqqq,eqweqwe	qqqqqqqqq,eqweqwe	Video url (iframe link).com	0	1720324598
25	qweqwe_premium	qweqweq			14	3	3	10	1000	Batumi	Georgia	qqqqqq	3	2	2	23	2024-07-06	1720279999	ordinary	qweqwe@gmail.com	georgian,english,russian	124124124124		qqqqqqqqq,eqweqwe	qqqqqqqqq,eqweqwe	qqqqqqqqq,eqweqwe	qqqqqqqqq,eqweqwe	Video url (iframe link).com	1720310239	1720324639
\.


--
-- Data for Name: hr_job_cats; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_job_cats (cid, name) FROM stdin;
1	IT სფერო
2	მარკეტინგი, რეკლამა
3	განათლება, მეცნიერება
4	მედიცინა, ფარმაცია
5	მშენებლობა, უძრავი ქონება
6	ტრანსპორტი, ავტობიზნესი
7	სილამაზე, მოდა
8	სპორტი, ხელოვნება
9	საოფისე საქმიანობა
10	საცალო და საბითუმო ვაჭრობა
11	ავიაცია / აეროპორტი
12	გაყიდვები
13	დაზღვევა
14	ენერგეტიკა / ინჟინერია 
15	იურიდიული
16	კაზინო / Gambling 
17	 აზარტული თამაშები
18	ტურიზმი
19	სატუმრო/რესტორანი
20	დაცვა
21	ხელოსანი / მონტაჟი
22	ფინანსები, ბანკები
23	მომსახურე პერსონალი
24	საზღვაო / საპორტო 
25	მეცნიერება/განათლება
26	მედია, გამომცემლობა
27	ადამიანური რესურსები
28	სხვა
\.


--
-- Data for Name: hr_job_requests; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_job_requests (rid, by_whom, status_of_requests, desct_text, company_id, job_id, reg_time, unixtime) FROM stdin;
\.


--
-- Data for Name: hr_saved_candidates; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_saved_candidates (sid, user_id, company_id, when_saved) FROM stdin;
18	3	12	1708196334
19	4	12	1708196335
20	2	12	1708196344
21	15	12	1708196345
22	1	12	1708196346
34	1	6	1708266587
35	4	18	1719671850
36	2	18	1719671852
37	4	20	1719782780
38	16	21	1719831715
39	22	23	1719849514
40	17	23	1719850530
41	16	23	1719850533
42	4	23	1719850535
\.


--
-- Data for Name: hr_saved_jobs; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_saved_jobs (jid, user_id, job_id, when_saved) FROM stdin;
30	22	19	1719849287
31	22	16	1719849294
32	22	17	1719849296
33	22	18	1719849299
34	22	21	1719849324
35	22	20	1719849329
36	22	15	1719849344
37	22	14	1719849358
\.


--
-- Data for Name: hr_user; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_user (uid, name, surn, password, mobnumber, pemail, reg_time, company_id, unixtime, birth_yy, birth_mm, birth_dd, gender, user_type, compname, website, sector, aboutcompany, country, state, city, postalindex, fulladdress, photo_id, photo_type, facebook, twitter, linkedin, dribble, photo_addr, instagram, tiktok, languages, qualification, experience, capability, founded, viewed, cover_pic, ad_pic, ad_pic_url, package_type) FROM stdin;
4	qqqe1231	ქქქქქქქ	sss_123	1112123123123	new@gmail.com	2024-02-14 00:57:59.730699+04	0	1707857879	0	0	0	none	candidate										0														0				none
5	qqqe1231	ქქქქქქქ	qqqqqqqq	123123123	3new1@gmail.com	2024-02-14 00:58:29.725579+04	0	1707857909	0	0	0	none	candidate2										0														0				none
10	qweqwe	qweqweqwe		124123123123	qweqwe@wqewq.com	2024-02-14 19:09:34.35466+04	0	1707923374	0	0	0	none	company										0														0				none
8	ნუკრი22	სახელი33333	ქწექწექწექწექწე	123123123	ge233332ga@wqewq.com	2024-02-14 18:58:10.868437+04	0	1707922690	0	0	0	none	company	n/a		10							1251234	.jpg					0MmNGERKCMyfeXwRiZT3jphoto_1708117859332176_3762362_picq_16t0_yq2cu4cp451v2x311573ya4_23wi18t514z2by.jpg								0				none
12	qweqweqw222222222	eqweqwe22222222	123123123123	12312331123	qw3333123eqwe@wqewq.com	2024-02-14 19:11:08.489054+04	0	1707923468	0	0	0	none	company	222222222222222		14							1251234	.jpg					u6tpIKfJq4QUTmAuc1qp_pic__17081941641692103_2177532_pic1y_3w1zqat52y1cpy501v164i1x57ubc_4434q2t832_2.jpg								0				none
7	ნუკრი	სახელი	weqweqweqwe	1231232222	ge2ga@wqewq.com	2024-02-14 18:57:24.915101+04	0	1707922644	0	0	0	none	company	n/a		12							1251234	.jpg													0				none
14	1111111	22222222	123456	555112233	2213123@wqewq.com	2024-02-14 19:12:08.813568+04	153344	1707923528	0	0	0	none	company	აბააა	www.qqwekge.ge	11	აბაააააააა\r\n	საქართველო	აჭარა	ბათუმი	6000	ბათუმი  ბლაბლაბალ	1251234	.jpg	fb.com	tw.com	lnk.com	dr.com	OEnhaBUilZlYDNKJBcF5nphoot_17082532053016184_1559560_pic6yq523q52t20b4x5p142_4y1ca1318zivuyc473t_w11_.jpg								0				none
2	ნუკრი	ბერიძE	123123123	555112233	gmq@g2mail.com	2024-02-12 23:41:01.938191+04	0	1707766861	0	0	0	none	candidate			\N	აწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწაწ	საქართველო	აჭარა	ბათუმი			1251234	.jpg					paIY31o9CrplRnxCAA45picture_17081749279239801_5071252_picvi2yctz341433cw18qtqxapy511552b712y46_u_2014_.jpg				2	4	Programming		0				none
6	ნუკრი	სახელუი	sex123	12312322	gega@wqewq.com	2024-02-14 18:54:37.428235+04	123123123	1707922477	0	0	0	none	company	n/a		12							1251234	.jpg					Fzuc6bB4aTmK1spQErELpicture_17082604279708539_1149815_picv4u8ta3pc41y_52t1iq_271530q23y6xy4151c_42wbz1.jpg								0				none
15	ახალი	ბბბბბ	sss123	44455	kek@gmai.ocmo	2024-02-17 15:03:16.304024+04	0	1708167796	0	0	0	none	candidate										0														0				none
1	ნუკრი2222	ბერიძE33333	2222222	555112233	gmq@gmail.com	2024-02-12 23:40:45.012797+04	0	1707766845	0	0	0	none	candidate		ww222w.qqwekge.ge	\N							1251234	.jpg					fmOGlywAASttbogQFEaGfoto_17081145201426158_9359816_pic31qt461u2tyby0qz_5_5c_1w4y831ic44211a3227px5v.jpg			ქართUლი,ინგლისური	1	2			0				none
11	qweqweqw	eqweqwe	123123123	12312331	qw3123eqwe@wqewq.com	2024-02-14 19:10:41.355631+04	0	1707923441	0	0	0	none	company	კომპანია ნომერი 1		6	qweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwerqweqwerqtqwer						1251234	.jpg					wJ9AeTTYs1LKdGAm83r6photo_17081754691812797_3863691_pica4_41w1i_1qqy445_cc13b2610zp85t723y5u1tyx2v23.jpg							1500	0				none
9	ნუკრი22qwe	სახელი33333qwe	123123123123123	124123123123	3ge233ee3332ga@wqewq.com	2024-02-14 18:58:46.821144+04	1513	1707922726	0	0	0	none	company	qweqweqwe	weqweqweqwe	15	qweqweqweq						1251234	.jpg													0				none
3	ნუკრი	ბერიძე	qqqqqq	555112233	gqmq@g2mail.com	2024-02-12 23:41:31.005428+04	0	1707766890	0	0	0	none	candidate			\N	ქწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწექწე						1251234	.jpg									1	1			0				none
13	აწწწ	უწწწ	123123123123	12312331123	q2w33333123eqwe@wqewq.com	2024-02-14 19:11:39.87792+04	111222333	1707923499	0	0	0	none	company	n/a	www.nova.ge	15	კომპანია ნოვა ბაზარზე 2006 წელს გამოჩნდა. საწყის ეტაპზე, ხუთი მეგობრის მიერ შექმნილი კომპანიის საქმიანობის სფეროს სამშენებლო მასალების იმპორტი და რეალიზაცია წარმოადგენდა. სამშენებლო და სარემონტო მასალების წარმოება 2011 წლიდან ნოვამ საკუთარი საწარმოო ხაზი გახსნა, რომლის მოდერნიზაცია და გაფართოვებაც დღემდე გრძელდება. კომპანია უკვე 300-ზე მეტი დასახელების პროდუქტს აწარმოებს, მათ შორისაა: პოლიეთილენის ავზები, სახურავის მასალები, თაბაშირ-მუყაოს და მეტალოპლასტმასის პროფილები, წყლის ბარიერები, სხვადასხვა აქსესუარები და ა.შ. ნოვა საქართველოში ექსკლუზიურად წარმოადგენს ისეთ ბრენდებს, როგორიცაა: NIPPON PAINT-ის ჯგუფი - BETEK, FAWORI; SAINT GOBAIN-ის ჯგუფი - IZOCAM, RIGIPS; INGCO; BIEN. სამშენებლო მასალების ჰიპერმარკეტი ნოვა წლების განმავლობაში ქართულ ბაზარზე ცნობილი იყო, როგორც სამშენებლო მასალების ერთ-ერთი მსხვილი მწარმოებელი და იმპორტიორი, 2020 წლიდან კი საცალო მიმართულებით თბილისსა და ბათუმში სამშენებლო მასალების ორი მეგაცენტრი გაიხსნა. მეგაცენტრებში 40 000-მდე დასახელების პროდუქტია წარმოდგენილი. კომპანიაში 500-ზე მეტი ადამიანია დასაქმებული, წარმატებული ბიზნესის მშენებლობის პროცესი, არა მარტო მომხმარებლისთვის ხელმისაწვდომობის გაზრდას, არამედ თანამშრომელთა სტიმულირებასა და პროფესიულ ზრდასაც ითვალისწინებს. სამშენებლო მასალების ონლაინ მაღაზია 2021 წელს კომპანიამ მიზნად საუკეთესო ონლაინ მაღაზიის შექმნა დაისახა. ნოვა არის ISO 9001:2015 სერტიფიკატის მფლობელი. კონტაქტი *0033 info@nova.ge\r\n\r\n						1251234	.jpg					KWPpGW5AVtgViqZjDKkRfoto_17084626783298027_3430244_pic51308127xq24y4455qtubvy__wpa2cc1ti136y_3211z4.jpg							2022	0	maCAxd3Bqpg1Cj55MOihphoto_17085241888140045_8085418_pic4151cv3t2z4q5xu0_p7ctqa_1y_y2241w6528i43y11b3			none
17	Nukri Beridze	qweqwe	geguna27@gmail.com	125412512	geguna27@gmail.com	2024-06-29 14:50:59.805442+04	0	1719658259	0	0	0	none	candidate										0														0				none
18	qe12313	123123	ab33a@gmail.com	124124124	ab33a@gmail.com	2024-06-29 18:36:49.690192+04	1241234124	1719671809	0	0	0	none	company	qweqweqwe									0														0				none
19	qweqwe123	qweqwe123	qweqwe123@gmail.com	1241231	qweqwe123@gmail.com	2024-06-30 15:43:45.167083+04	12412412	1719747825	0	0	0	none	company	qweqwe123@gmail.com									0														0				none
20	Nukri Beridze	qweqwe	jubi@gmail.com	12341241241	jubi@gmail.com	2024-07-01 01:21:56.61509+04	124124	1719782516	0	0	0	none	company	jubi@gmail.com									0														0				none
21	gega	koberidze	koberidze@gmail.com	12341241241	koberidze@gmail.com	2024-07-01 14:59:25.903777+04	124124124	1719831565	0	0	0	none	company	Webiz		3							1251234	.jpg													0				none
16	nukri	Koberidze	aba@gmail.com	12341241241	aba@gmail.com	2024-06-12 16:21:06.792473+04	0	1718194866	0	0	0	none	candidate			\N							1251234	.jpg									1	1			0				none
22	qweqwe123123	123123	abaeee@gmail.com	124124124	abaeee@gmail.com	2024-07-01 19:43:37.684517+04	0	1719848617	0	0	0	none	candidate										0														0				none
24	Nukri Beridze	qweqweqwe	aba23@gmail.com	12341241241	aba23@gmail.com	2024-07-01 20:16:04.426656+04	0	1719850564	0	0	0	none	candidate			\N							1251234	.jpg					XoLcsZkNUKu5eRdEY9ft_pic__1719912661503103_2124482_pic2_4wp31ty52y2ub31x6z_1c7_0yvqt5q532414ai81c14.jpg				1	1			0				none
23	qqqq	123312312	qqq@gmail.com	12341241241	qqq@gmail.com	2024-07-01 19:58:14.850689+04	123123123	1719849494	0	0	0	none	company	QQQ webiz		2		Georgia		Batumi	6000	Agmashenebeli	1251234	.jpg												2015	0				premium
\.


--
-- Data for Name: hr_user1; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_user1 (uid, name, surn, password, mobnumber, pemail, reg_time, reg_time2, company_id, unixtime, birth_yy, birth_mm, birth_dd) FROM stdin;
\.


--
-- Data for Name: hr_user12; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_user12 (uid, name, surn, password, mobnumber, pemail, reg_time, company_id, unixtime, birth_yy, birth_mm, birth_dd) FROM stdin;
1	qweqwe1231	qweqwe	3123123	1231231	qweqwe@wqewq.com	2024-02-12	0	1707766514	0	0	0
\.


--
-- Data for Name: hr_user122; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_user122 (uid, name, surn, password, mobnumber, pemail, reg_time, reg_time2, company_id, unixtime, birth_yy, birth_mm, birth_dd) FROM stdin;
1	qqq	qqqqqq	qqqqqq	123123	qweqwe@wqewq.com	2024-02-12	2024-02-12 23:36:37.429665+04	0	1707766597	0	0	0
\.


--
-- Data for Name: hr_user_sessions; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_user_sessions (session_id, whenlogged, hash, user_id, time_limit, date_auth) FROM stdin;
1	ac6746ee2b18aee089340a904fca965d8e94fbcadf69d82065fdd0c5bcfa53ef	d262c45886427adc1422e7735603fe8b989f01ac130f863a5eafe4f47b813699	1	1	1707813283
2	9c6e92b68ab84b172321b35826e6552b68a7b05fb03556365f3047d49951b822	01da93d06311c72e991045f436ba1a1829aa3a0e9f09f9d1463c508c4005b73b	14	1	1707923571
3	6bf9e0d9970dc6169878f40013b296143e912528d0e0eb8f4d9c748fe839b35c	72e8fbf13b29e05e9eae11fa90231214d336b6e33ee7f5c7a10f89d366cc7645	1	1	1707928565
4	ef8e426cf92b9ecf4f8240cc8547a25279b8fad8ef357c3ce6e80bfc7e454ae2	62faeeceb5c98d739748a96cd288d8c0b2c6887b671e0140be9eb3c36270f189	14	1	1707928780
5	25e9f6947606d1511aea76c48576799a6cd5bdfc122f5d43fcb6cfeb79d9eac9	f3cdd99c868b471303de9db5202dad25a2f41c6eef0c8514dd928fff4a2edd2b	1	1	1707933484
6	308127f7e37ad4cfa4932c2ba2c8f31ef66764c7db02f2befc1a3d556c4367fd	4214779d7c7a156e58f97e5f93068069ae9cac229bd8d2805d56fee6ee2b9bc5	14	1	1707936067
7	35b439fcb07549df2e41ef446f6e2cb60511dbcfc9700beae7c4b9f478d9d11b	5c1bfa622467ce761f9a8e0f8d48bd869b34122c42ff6efb6abe34fe8eba1c86	14	1	1707938921
8	3f8da5bc268eed9a02da0979e591b7d46104d7823066e0938f5d70d53f2baade	ba47637f2d27d119d9600d4fcd0b5c9e095051784b068a8b5c4f7d03eb3315a0	1	1	1707938969
9	50d2696361a4ff9dacff9dcb53611ec38533cf1f5691dea5974a275326f89f25	b67f915bfecc657f9944845d0f3b0b9a24586105a18af8b40d5646e8dd67d219	1	1	1708081887
10	5d2828c47235401cb9e703dd15cea40e1df0cef0c16851a248debf6cb4c05b73	7c123dcc627d0676b371202352eaa21b694f766ccaf02548e7241c1b9458ef91	7	1	1708082220
11	bb323a8b87c5bbd16392179a308e0b7b2941f9b92ec6d4997cb9dfb829161088	f7ca561fd7e5ff39629a8a6192f3c0aadc108f245331c34446e07bd5eb4a4842	8	1	1708114589
12	bc1d13ecd032d6636acde273041da437ca0495691ea8d460db7545424eb145a7	58302dfdf97ab3b66640791fabe09b50426b4917f6155892a927cbdabf43a0bd	9	1	1708117727
13	163a4c2b206613ddc1bc19feeaf03f2d7793a79f1b726b9abd558a5a1f6514aa	36c2b69e128d5c9d4794d8fe460e800cd6732eef1beebcffe2d6d21773e408b2	2	1	1708118371
14	634b52ade36115ccb3d05b105312f762e3ee44411ff0a4cb853f6a71cfbb175b	e3136cb1e53ceb19cf782962493705e945f30408dc21e6738cde5c24cbb704f7	11	1	1708175436
15	a1386fc4915cb803b982e2e74fb2eaebdee516b2928f554de5bcda14c220c036	67d38dd15d5404ef0b2a5c6707bf05b3fff4652afa9e3b8daa9dba003be3704d	2	1	1708176149
16	68dffd67d47ac3ed35ebf595b278a3f8b7287d3da5807f53fd940664deb10330	7470d79bc607fcc601559c69c43b0a519d4aa9bc13fe3c1151851944eba2750f	3	1	1708192901
17	1e28d64786264cc5350d89581bb2f7473ad9bfa91a97baff884af5e08a02338c	b218c28ca9a0619b9a8646b425d5b7b3c0bd6968c73c36bf3842fe54cca1d004	12	1	1708193941
18	51379ab14c2a6a02240c8ffc36bf248cf1c99fa00ca60009e7f614584a748fcb	c3378e54708c6aaf810721473faff8192fb992dedd131c9cd53ebd7d302ecd08	14	1	1708253170
19	5697722deccba4fa5c2ad61bb8631f39dfe672bb1fde2bb047b8d28bd2eeb6ef	58912239827d362f56242e8da5d829b679e76649633b240dc98b31e7355ac9cc	6	1	1708260339
20	b67e6f032f0b5447c0d79d9f6fceb0d34b74a8cdc3cb479f458795de97ed554b	475cb97c1ef7d85910f3d9c50d9fb1dab930299c81d10385b48b7a9e857e3194	3	1	1708265692
21	aef0cd8b9d58a9a2649ca1973d7d85a3ea37ff2bd988856d4c81dade1bfeaedc	832524df7fc731c95d38d93e48502075bbaa8b982538b7099ab6f374567f89de	3	1	1708270889
22	c3d445ab362e1c48d3602c491acf0d4675cf6637d1004be9cd7c36ee05a1982d	a1ae6a33cc337b734c1a33439335b8a7a9cb9f2f0a3b5e32075987c538f7df43	13	1	1708461465
23	04458822781865e03fcf6d17ff5e656ab2b088f0480ed6100c5fa5eb8639ea91	7d59931799b4d823a8eec830aa89229b64a398dbb4e1eb393ee4a87c853b1ec9	4	1	1708525310
24	5086000c5a3734de81b88038bde5bd25c8b543ef48fd1327505fba7d816ae718	2b5ed26a741c911dde08e3ecf000a3821b2a9644eb58b7037b4f457843040bbc	16	1	1718194871
25	b0d47dced0d32fc14adba669cca1f06757e8a3ea1bfa947d1ac7db92e98696db	b277c0278e21654031ec176cdbe6bbe0a5ca986dcb4dfea6eff066998ab9c554	17	1	1719658264
26	fbe967d50c7ba6e764ee210c8c8929c14957a8dd5f703d5594fd0797b65c47bf	64aea3185433a66cea8af27c723ca4bfa697c3d8314e2efd71255c42330f4ef0	16	1	1719671596
27	686212444fa2be2b0d0ee847d421d71806e280212b2a66e2924dd0218d848de0	f3eccbf758fef773ea374d10006ff1c20ec2efa1e8876ed84f122439bbb39828	18	1	1719671813
28	96b4ec9112c8c903ca957b709a7a76c5c830cdb07a7ec35c0702557c910ab20e	f0a38fddfab5c23820d5ebd2c116f42594d08988c5ff6b915e60f2d08f3e2e5b	16	1	1719683117
29	62a9bc9f578f2c44690dedbcd8b6b290b4e2d43e1a110c29d5d2ada4c4e75750	0836fc190143be7a3b6f07f7f71ef5a9f0ff06be0179e983be279320662efc37	19	1	1719747829
30	9f1abebc92025cd3e499eba1bc3489804ac5bd5ff850e536442467d147fb0272	10a80e92eec338a7271c189f9c7aff340d5770b9b66fcec5432d6e1882a5492b	20	1	1719782520
31	dc10d660712157400fbc6b490aa2e8acf32c789fcbc22deb444d4d6419b5d4d6	a1ac11d9f3bf68f60ba5846f9505f2141ed86ea0ad11eebd9dfdc680fb1dc54e	21	1	1719831570
32	e9880333aa8bb920e38d11abf599a3369cee0bff34008cdca7491cf68a575d3c	769555099a9db161285eb970bec08b54ac885e4fc5abe2f80bba4645a0fd22f0	22	1	1719848648
33	293377e8128242a1c6508bcee5192ba25e9f7c5d40080802c59eaf796d649a6f	16edd65bba7dfbd0f51056b7f0af628afaf7aa60280d5606f32b6da2ded068de	23	1	1719849498
34	44ae264764e9a044750ceaee1b070cbf423c1ea03efd1a6fb81219325b3e42dd	a708cdedb81c4e65603c49d46cd2116c3e7a2dca1096a7f9bedcab6b1f887e03	22	1	1719849905
35	30f5fc497f9a4590888bb78c431fbd509df248a56058f852ec508f9614e21805	d2553694507ae982e0e606cfa8a9a45dfe72a723957b04b8fbe2a5a705a944b1	24	1	1719850567
36	a3e2e54785ac59945576059baba8fb4ef7588fd0befd9eed9dec7f103e7956bb	e214d79f91100cd5bd4cad91a5ea01376f85279ecd51afe8d767365859476f8b	23	1	1720004652
37	85854dfc3684678deed292d4c36cfd319075e68d58a08e2dcb65aab150dfcc57	f70d53e4080deb1bd25e6a8057ba662a942d9d89f38a55b9cc954b67dc4e4dcd	16	1	1720126763
\.


--
-- Data for Name: hr_user_skills; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_user_skills (id, e_skillname, e_percentage, user_id, when_saved) FROM stdin;
1	javascript	50	3	1708288224
3	C++	5400	3	1708288270
5	php	50	4	1710942525
6	php	100	16	1719756535
\.


--
-- Data for Name: hr_userworkstory; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.hr_userworkstory (id, e_companyname, e_title, e_desc, e_timefrom, e_timeto, user_id, when_saved) FROM stdin;
\.


--
-- Data for Name: kuku1; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.kuku1 (id, name) FROM stdin;
\N	qqq
\N	qqq
\N	qqq
\N	qqq
\N	qqq
\N	qqq
\.


--
-- Data for Name: kuku31; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.kuku31 (id, name) FROM stdin;
\.


--
-- Data for Name: s_test132; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.s_test132 (id, name, surn, birth_yy, birth_mm, birth_dd) FROM stdin;
\.


--
-- Data for Name: s_test1321; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.s_test1321 (id, name, surn, birth_yy, birth_mm, birth_dd) FROM stdin;
\.


--
-- Data for Name: s_test13321; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.s_test13321 (id, name, surn, birth_yy, birth_mm, birth_dd) FROM stdin;
\.


--
-- Data for Name: s_test133213; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.s_test133213 (id, name, surn, birth_yy, birth_mm, birth_dd) FROM stdin;
\.


--
-- Data for Name: s_user; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.s_user (uid, name, surn, password, mobnumber, pemail, reg_time, unixtime, birth_yy, birth_mm, birth_dd) FROM stdin;
1	111	qweqwe				2024-02-12	0	0	0	0
2	1112	qweqwe2				2024-02-12	0	0	0	0
3	11123	qweqwe23				2024-02-12	0	0	0	0
\.


--
-- Data for Name: s_user1z; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.s_user1z (uid, name, surn, password, mobnumber, pemail, reg_time, unixtime, birth_yy, birth_mm, birth_dd) FROM stdin;
\.


--
-- Data for Name: test1; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.test1 (id, name, surn, birth_yy, birth_mm, birth_dd) FROM stdin;
\.


--
-- Data for Name: test132; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.test132 (id, name, surn, birth_yy, birth_mm, birth_dd) FROM stdin;
\.


--
-- Data for Name: user_cvs; Type: TABLE DATA; Schema: public; Owner: tan
--

COPY public.user_cvs (id, user_id, uploaded, updated, resume) FROM stdin;
6	16	2024-06-30	2024-06-30	ResumepdfuekvFywXaiVjh79np7Wj
7	22	2024-07-01	2024-07-01	NpdfxnOFrBJwWFli1IAxxG7K
8	24	2024-07-02	2024-07-02	ncvfr_apdfpOQXPTJqpAhRiUBPC7IE
9	24	2024-07-02	2024-07-02	NpdfH2E0Ge3jBGTrPlSCwK5o
10	24	2024-07-02	2024-07-02	cvpdfW85BFpYC9VCkkEIUWIbT
\.


--
-- Data for Name: uzer; Type: TABLE DATA; Schema: public; Owner: dev
--

COPY public.uzer (id, name) FROM stdin;
1	kekz
2	kekz
3	kekz1
4	kekz12
5	kekz123
6	kekz1234
7	kekz12345
8	kekz123456
9	kekz1234567
10	kekz1234567ქწექწექწე
11	kekz1234567ქწექწექწე
12	qwe_kne1zzz
13	qwe_kne1zzz
14	qwe_kne1zzz
15	qwe_kne1zzz
16	qwe_kne1zzz
17	qwe_kne1zzz
18	qwe_kne1zzz
19	qwe_kne1zzz
20	qwe_kne1zzz
21	qwe_kne1zzz
22	qwe_kne1zzz
23	qwe_kne1zzz
24	qwe_kne1zzz
25	qwe_kne1zzz_ქქქქქ
26	qwe_kne1zzz_ქქქქქ
27	qwe_kne1zzz_ქქქქქ
28	qwe_kne1zzz_ქქქქქ
29	qwe_kne1zzz_ქქქქქ
30	qwe_kne1zzz_ქქქქქ
\.


--
-- Name: cv_requests_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tan
--

SELECT pg_catalog.setval('public.cv_requests_id_seq', 56, true);


--
-- Name: hr_education_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_education_id_seq', 3, true);


--
-- Name: hr_job_cats_cid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_job_cats_cid_seq', 28, true);


--
-- Name: hr_job_jid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_job_jid_seq', 25, true);


--
-- Name: hr_job_requests_rid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_job_requests_rid_seq', 1, false);


--
-- Name: hr_saved_candidates_sid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_saved_candidates_sid_seq', 42, true);


--
-- Name: hr_saved_jobs_jid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_saved_jobs_jid_seq', 37, true);


--
-- Name: hr_user122_uid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_user122_uid_seq', 1, true);


--
-- Name: hr_user12_uid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_user12_uid_seq', 1, true);


--
-- Name: hr_user1_uid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_user1_uid_seq', 1, false);


--
-- Name: hr_user_sessions_session_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_user_sessions_session_id_seq', 37, true);


--
-- Name: hr_user_skills_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_user_skills_id_seq', 6, true);


--
-- Name: hr_user_uid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_user_uid_seq', 24, true);


--
-- Name: hr_userworkstory_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.hr_userworkstory_id_seq', 2, true);


--
-- Name: s_test1321_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.s_test1321_id_seq', 1, false);


--
-- Name: s_test132_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.s_test132_id_seq', 1, false);


--
-- Name: s_test133213_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.s_test133213_id_seq', 1, false);


--
-- Name: s_test13321_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.s_test13321_id_seq', 1, false);


--
-- Name: s_user1z_uid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.s_user1z_uid_seq', 1, false);


--
-- Name: s_user_uid_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.s_user_uid_seq', 3, true);


--
-- Name: test132_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.test132_id_seq', 1, false);


--
-- Name: test1_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.test1_id_seq', 1, false);


--
-- Name: user_cvs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tan
--

SELECT pg_catalog.setval('public.user_cvs_id_seq', 10, true);


--
-- Name: uzer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev
--

SELECT pg_catalog.setval('public.uzer_id_seq', 30, true);


--
-- Name: cv_requests cv_requests_pkey; Type: CONSTRAINT; Schema: public; Owner: tan
--

ALTER TABLE ONLY public.cv_requests
    ADD CONSTRAINT cv_requests_pkey PRIMARY KEY (id);


--
-- Name: hr_education hr_education_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_education
    ADD CONSTRAINT hr_education_pkey PRIMARY KEY (id);


--
-- Name: hr_job_cats hr_job_cats_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_job_cats
    ADD CONSTRAINT hr_job_cats_pkey PRIMARY KEY (cid);


--
-- Name: hr_job hr_job_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_job
    ADD CONSTRAINT hr_job_pkey PRIMARY KEY (jid);


--
-- Name: hr_job_requests hr_job_requests_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_job_requests
    ADD CONSTRAINT hr_job_requests_pkey PRIMARY KEY (rid);


--
-- Name: hr_saved_candidates hr_saved_candidates_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_saved_candidates
    ADD CONSTRAINT hr_saved_candidates_pkey PRIMARY KEY (sid);


--
-- Name: hr_saved_jobs hr_saved_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_saved_jobs
    ADD CONSTRAINT hr_saved_jobs_pkey PRIMARY KEY (jid);


--
-- Name: hr_user122 hr_user122_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user122
    ADD CONSTRAINT hr_user122_pkey PRIMARY KEY (uid);


--
-- Name: hr_user12 hr_user12_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user12
    ADD CONSTRAINT hr_user12_pkey PRIMARY KEY (uid);


--
-- Name: hr_user1 hr_user1_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user1
    ADD CONSTRAINT hr_user1_pkey PRIMARY KEY (uid);


--
-- Name: hr_user hr_user_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user
    ADD CONSTRAINT hr_user_pkey PRIMARY KEY (uid);


--
-- Name: hr_user_sessions hr_user_sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user_sessions
    ADD CONSTRAINT hr_user_sessions_pkey PRIMARY KEY (session_id);


--
-- Name: hr_user_skills hr_user_skills_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_user_skills
    ADD CONSTRAINT hr_user_skills_pkey PRIMARY KEY (id);


--
-- Name: hr_userworkstory hr_userworkstory_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.hr_userworkstory
    ADD CONSTRAINT hr_userworkstory_pkey PRIMARY KEY (id);


--
-- Name: s_test1321 s_test1321_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_test1321
    ADD CONSTRAINT s_test1321_pkey PRIMARY KEY (id);


--
-- Name: s_test132 s_test132_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_test132
    ADD CONSTRAINT s_test132_pkey PRIMARY KEY (id);


--
-- Name: s_test133213 s_test133213_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_test133213
    ADD CONSTRAINT s_test133213_pkey PRIMARY KEY (id);


--
-- Name: s_test13321 s_test13321_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_test13321
    ADD CONSTRAINT s_test13321_pkey PRIMARY KEY (id);


--
-- Name: s_user1z s_user1z_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_user1z
    ADD CONSTRAINT s_user1z_pkey PRIMARY KEY (uid);


--
-- Name: s_user s_user_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.s_user
    ADD CONSTRAINT s_user_pkey PRIMARY KEY (uid);


--
-- Name: test132 test132_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.test132
    ADD CONSTRAINT test132_pkey PRIMARY KEY (id);


--
-- Name: test1 test1_pkey; Type: CONSTRAINT; Schema: public; Owner: dev
--

ALTER TABLE ONLY public.test1
    ADD CONSTRAINT test1_pkey PRIMARY KEY (id);


--
-- Name: user_cvs user_cvs_pkey; Type: CONSTRAINT; Schema: public; Owner: tan
--

ALTER TABLE ONLY public.user_cvs
    ADD CONSTRAINT user_cvs_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

