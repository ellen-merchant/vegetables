CREATE DATABASE vegetables;

CREATE TABLE vegetables (
"id" INT8 NOT NULL,
"name" VARCHAR(256) NOT NULL,
"classification" VARCHAR(256) NOT NULL,
"description" TEXT,
"edible" BOOLEAN NOT NULL DEFAULT t,
PRIMARY KEY ("id")
) WITH (OIDS=FALSE);

CREATE UNIQUE INDEX "vegetable_id_key" ON "vegetables" USING BTREE ("id" "pg_catalog"."int8_ops");

CREATE SEQUENCE vegetable_id_seq START WITH 1 INCREMENT BY 1 NO MINVALUE NO MAXVALUE CACHE 1;

-- Optional - Depending on which username you use to connect to the database
-- ALTER TABLE vegetable_id_seq OWNER TO postgres;

ALTER SEQUENCE vegetable_id_seq OWNED BY vegetables.id;

ALTER TABLE ONLY vegetables.vegetables ALTER COLUMN id SET DEFAULT nextval('vegetable_id_seq'::REGCLASS);

-- Optional - Sample data
INSERT INTO vegetables(name, classification, description, edible) VALUES('Broccoli', 'Flower', 'Broccoli is an edible green plant in the cabbage family whose large flowering head is eaten as a vegetable.', 't');
INSERT INTO vegetables(name, classification, description, edible) VALUES('Asparagus', 'Stem', 'Asparagus, or garden asparagus, folk name sparrow grass, scientific name Asparagus officinalis, is a spring vegetable, a flowering perennial plant species in the genus Asparagus.', 't');
INSERT INTO vegetables(name, classification, description, edible) VALUES('Spinach', 'Leaf', 'Spinach is an edible flowering plant in the family Amaranthaceae native to central and western Asia.', 't');
INSERT INTO vegetables(name, classification, description, edible) VALUES('Cauliflower', 'Flower', 'Cauliflower is one of several vegetables in the species Brassica oleracea in the genus Brassica, which is in the family Brassicaceae.', 't');
INSERT INTO vegetables(name, classification, description, edible) VALUES('Onion', 'Bulb', 'The onion also known as the bulb onion or common onion, is a vegetable that is the most widely cultivated species of the genus Allium.', 't');
INSERT INTO vegetables(name, classification, description, edible) VALUES('Peas', 'Seed', 'The pea is most commonly the small spherical seed or the seed-pod of the pod fruit Pisum sativum.', 't');
INSERT INTO vegetables(name, classification, description, edible) VALUES('Carrot', 'Root', 'The carrot is a root vegetable, usually orange in colour, though purple, black, red, white, and yellow cultivars exist.', 't');
INSERT INTO vegetables(name, classification, description, edible) VALUES('Turnip', 'Root', 'The turnip or white turnip is a root vegetable commonly grown in temperate climates worldwide for its white, fleshy taproot.', 't');
INSERT INTO vegetables(name, classification, description, edible) VALUES('Tomato', 'Fruit', 'The tomato is the edible, often red, berry of the nightshade Solanum lycopersicum, commonly known as a tomato plant.', 't');