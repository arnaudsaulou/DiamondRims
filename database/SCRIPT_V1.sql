#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Brand
#------------------------------------------------------------

CREATE TABLE Brand(
        BRAND_ID          Int  Auto_increment  NOT NULL ,
        BRAND_NAME        Varchar (50) NOT NULL ,
        BRAND_DESCRIPTION Text NOT NULL
	,CONSTRAINT Brand_PK PRIMARY KEY (BRAND_ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Model
#------------------------------------------------------------

CREATE TABLE Model(
        MODEL_ID          Int  Auto_increment  NOT NULL ,
        MODEL_HORSE_POWER Int NOT NULL ,
        MODEL_DESCRIPTION Text NOT NULL ,
        BRAND_ID          Int NOT NULL
	,CONSTRAINT Model_PK PRIMARY KEY (MODEL_ID)

	,CONSTRAINT Model_Brand_FK FOREIGN KEY (BRAND_ID) REFERENCES Brand(BRAND_ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Car
#------------------------------------------------------------

CREATE TABLE Car(
        CAR_ID      Int  Auto_increment  NOT NULL ,
        CAR_MILAGE  Int NOT NULL ,
        CAR_COLOR   Varchar (50) NOT NULL ,
        CAR_PRICE   Int NOT NULL ,
        DESCRIPTION Text NOT NULL ,
        MODEL_ID    Int NOT NULL
	,CONSTRAINT Car_PK PRIMARY KEY (CAR_ID)

	,CONSTRAINT Car_Model_FK FOREIGN KEY (MODEL_ID) REFERENCES Model(MODEL_ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PICTURE
#------------------------------------------------------------

CREATE TABLE PICTURE(
        PICTURE_ID          Varchar (50) NOT NULL ,
        PICTURE_NUM         Int NOT NULL ,
        PICTURE_DESCTIPTION Text NOT NULL ,
        CAR_ID              Int NOT NULL
	,CONSTRAINT PICTURE_PK PRIMARY KEY (PICTURE_ID)

	,CONSTRAINT PICTURE_Car_FK FOREIGN KEY (CAR_ID) REFERENCES Car(CAR_ID)
)ENGINE=InnoDB;

