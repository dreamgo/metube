SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `metube`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`user` ;

CREATE TABLE IF NOT EXISTS `metube`.`user` (
  `uid` INT NOT NULL,
  `uname` VARCHAR(45) NOT NULL,
  `gender` VARCHAR(45) NOT NULL,
  `dob` DATE NOT NULL,
  `createTime` DATETIME NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `lastLoginTime` DATETIME NOT NULL,
  PRIMARY KEY (`uid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`guest`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`guest` ;

CREATE TABLE IF NOT EXISTS `metube`.`guest` (
  `gid` INT NOT NULL,
  `ipAddress` VARCHAR(45) NOT NULL,
  `lastVisitTime` DATETIME NOT NULL,
  PRIMARY KEY (`gid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`multimediaFiles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`multimediaFiles` ;

CREATE TABLE IF NOT EXISTS `metube`.`multimediaFiles` (
  `mid` INT NOT NULL,
  `mtitle` VARCHAR(45) NOT NULL,
  `mdescription` VARCHAR(45) NOT NULL,
  `uploadTime` DATETIME NOT NULL,
  `uploadUid` INT NOT NULL,
  `mSize` VARCHAR(45) NOT NULL,
  `viewPermission` INT NOT NULL,
  `commentPermisssion` INT NOT NULL,
  `ratePermission` INT NOT NULL,
  `gradeofRate` INT NOT NULL,
  `timesofRate` INT NOT NULL,
  `timesofView` INT NOT NULL,
  `timesofComment` VARCHAR(45) NOT NULL,
  `filePath` VARCHAR(45) NOT NULL,
  `mtype` VARCHAR(45) NOT NULL,
  `duration` VARCHAR(45) NOT NULL,
  `maxDimension` VARCHAR(45) NOT NULL,
  `others` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`mid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`userViewHistory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`userViewHistory` ;

CREATE TABLE IF NOT EXISTS `metube`.`userViewHistory` (
  `uid` INT NOT NULL,
  `mid` INT NOT NULL,
  `viewTime` DATETIME NULL,
  PRIMARY KEY (`uid`, `mid`),
  INDEX `fkviewHistory_idx` (`mid` ASC),
  CONSTRAINT `fkuserHistory1`
    FOREIGN KEY (`uid`)
    REFERENCES `metube`.`user` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkviewHistory2`
    FOREIGN KEY (`mid`)
    REFERENCES `metube`.`multimediaFiles` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`playlists`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`playlists` ;

CREATE TABLE IF NOT EXISTS `metube`.`playlists` (
  `plid` INT NOT NULL,
  `pltitle` VARCHAR(45) NOT NULL,
  `pldescription` VARCHAR(45) NOT NULL,
  `createTime` DATETIME NOT NULL,
  `createUid` INT NOT NULL,
  PRIMARY KEY (`plid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`tag` ;

CREATE TABLE IF NOT EXISTS `metube`.`tag` (
  `tagId` INT NOT NULL,
  `keywords` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`tagId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`keyword`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`keyword` ;

CREATE TABLE IF NOT EXISTS `metube`.`keyword` (
  `mid` INT NOT NULL,
  `tagId` INT NOT NULL,
  PRIMARY KEY (`mid`, `tagId`),
  INDEX `fk_idx` (`tagId` ASC),
  CONSTRAINT `fkcategory1`
    FOREIGN KEY (`mid`)
    REFERENCES `metube`.`multimediaFiles` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkcategory2`
    FOREIGN KEY (`tagId`)
    REFERENCES `metube`.`tag` (`tagId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`playlistFiles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`playlistFiles` ;

CREATE TABLE IF NOT EXISTS `metube`.`playlistFiles` (
  `plid` INT NOT NULL,
  `mid` INT NOT NULL,
  PRIMARY KEY (`plid`, `mid`),
  INDEX `fkplaylistFile_idx` (`mid` ASC),
  CONSTRAINT `fkplaylistFile1`
    FOREIGN KEY (`plid`)
    REFERENCES `metube`.`playlists` (`plid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkplaylistFile2`
    FOREIGN KEY (`mid`)
    REFERENCES `metube`.`multimediaFiles` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`favorateLists`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`favorateLists` ;

CREATE TABLE IF NOT EXISTS `metube`.`favorateLists` (
  `flid` INT NOT NULL,
  `fltitle` VARCHAR(45) NOT NULL,
  `fldescription` VARCHAR(45) NOT NULL,
  `createTime` DATETIME NOT NULL,
  `createUid` INT NOT NULL,
  PRIMARY KEY (`flid`),
  INDEX `fk_idx` (`createUid` ASC),
  CONSTRAINT `fkfl1`
    FOREIGN KEY (`createUid`)
    REFERENCES `metube`.`user` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`favavorateListFiles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`favavorateListFiles` ;

CREATE TABLE IF NOT EXISTS `metube`.`favavorateListFiles` (
  `flid` INT NOT NULL,
  `mid` INT NOT NULL,
  PRIMARY KEY (`flid`, `mid`),
  INDEX `fk_idx` (`mid` ASC),
  CONSTRAINT `fkflf1`
    FOREIGN KEY (`flid`)
    REFERENCES `metube`.`favorateLists` (`flid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkflf2`
    FOREIGN KEY (`mid`)
    REFERENCES `metube`.`multimediaFiles` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`comment` ;

CREATE TABLE IF NOT EXISTS `metube`.`comment` (
  `cmId` INT NOT NULL,
  `mid` INT NOT NULL,
  `cmContent` VARCHAR(45) NOT NULL,
  `cmTime` DATETIME NOT NULL,
  `cmReplyId` INT NOT NULL,
  PRIMARY KEY (`cmId`),
  INDEX `fkcmReplytocmId_idx` (`cmReplyId` ASC),
  INDEX `fk_idx` (`mid` ASC),
  CONSTRAINT `fkcmReplytocmId`
    FOREIGN KEY (`cmReplyId`)
    REFERENCES `metube`.`comment` (`cmId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkrcmide2`
    FOREIGN KEY (`mid`)
    REFERENCES `metube`.`multimediaFiles` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`rateRecord`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`rateRecord` ;

CREATE TABLE IF NOT EXISTS `metube`.`rateRecord` (
  `mid` INT NOT NULL,
  `uid` INT NOT NULL,
  PRIMARY KEY (`mid`, `uid`),
  INDEX `fk_idx` (`uid` ASC),
  CONSTRAINT `fkrateRecord1`
    FOREIGN KEY (`mid`)
    REFERENCES `metube`.`multimediaFiles` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkrecord2`
    FOREIGN KEY (`uid`)
    REFERENCES `metube`.`user` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`guestViewHistory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`guestViewHistory` ;

CREATE TABLE IF NOT EXISTS `metube`.`guestViewHistory` (
  `gid` INT NOT NULL,
  `mid` INT NOT NULL,
  `viewTime` DATETIME NOT NULL,
  PRIMARY KEY (`gid`, `mid`),
  INDEX `fkguestViewHistory_idx` (`mid` ASC),
  CONSTRAINT `fkguestViewHistory1`
    FOREIGN KEY (`gid`)
    REFERENCES `metube`.`guest` (`gid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkguestViewHistory2`
    FOREIGN KEY (`mid`)
    REFERENCES `metube`.`multimediaFiles` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`channel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`channel` ;

CREATE TABLE IF NOT EXISTS `metube`.`channel` (
  `chId` INT NOT NULL,
  `chTitile` VARCHAR(45) NOT NULL,
  `chDescription` VARCHAR(45) NOT NULL,
  `chCoverImgPath` VARCHAR(45) NULL,
  `chCreateTime` DATETIME NOT NULL,
  `chCreateUid` INT NOT NULL,
  PRIMARY KEY (`chId`),
  UNIQUE INDEX `chCreateUid_UNIQUE` (`chCreateUid` ASC),
  CONSTRAINT `fkchannel`
    FOREIGN KEY (`chCreateUid`)
    REFERENCES `metube`.`user` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`contact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`contact` ;

CREATE TABLE IF NOT EXISTS `metube`.`contact` (
  `Uid` INT NOT NULL,
  `contactUid` INT NOT NULL,
  `contactGroup` VARCHAR(45) NULL,
  PRIMARY KEY (`Uid`, `contactUid`),
  CONSTRAINT `fkContact1`
    FOREIGN KEY (`Uid`)
    REFERENCES `metube`.`user` (`uid`) 
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
CONSTRAINT `fkContact2`
    FOREIGN KEY (`contactUid`)
    REFERENCES `metube`.`user` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`message` ;

CREATE TABLE IF NOT EXISTS `metube`.`message` (
  `mid` INT NOT NULL,
  `sendUid` INT NOT NULL,
  `recieveUid` INT NOT NULL,
  `mtitle` VARCHAR(45) NOT NULL,
  `mcontent` VARCHAR(45) NOT NULL,
  `replyId` INT NOT NULL,
  `sendTime` DATETIME NOT NULL,
  PRIMARY KEY (`mid`),
  INDEX `fkmessage_idx` (`replyId` ASC),
  CONSTRAINT `fkmessage1`
    FOREIGN KEY (`replyId`)
    REFERENCES `metube`.`message` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkmessage2`
    FOREIGN KEY (`mid`)
    REFERENCES `metube`.`multimediaFiles` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`subscribe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`subscribe` ;

CREATE TABLE IF NOT EXISTS `metube`.`subscribe` (
  `uid` INT NOT NULL,
  `chId` INT NOT NULL,
  `subscribeTime` DATETIME NOT NULL,
  PRIMARY KEY (`uid`, `chId`),
  INDEX `fksubscribe_idx` (`chId` ASC),
  CONSTRAINT `fksubscribe1`
    FOREIGN KEY (`uid`)
    REFERENCES `metube`.`user` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fksubscribe2`
    FOREIGN KEY (`chId`)
    REFERENCES `metube`.`channel` (`chId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`group` ;

CREATE TABLE IF NOT EXISTS `metube`.`group` (
  `gid` INT NOT NULL,
  `gname` VARCHAR(45) NOT NULL,
  `gcreateTime` DATETIME NOT NULL,
  `gcreateUid` INT NOT NULL,
  `gdescription` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`gid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`groupMember`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`groupMember` ;

CREATE TABLE IF NOT EXISTS `metube`.`groupMember` (
  `gid` INT NOT NULL,
  `uid` INT NOT NULL,
  `joinTime` DATETIME NOT NULL,
  PRIMARY KEY (`gid`, `uid`),
  INDEX `fk_idx` (`uid` ASC),
  CONSTRAINT `fkgrougm1`
    FOREIGN KEY (`gid`)
    REFERENCES `metube`.`group` (`gid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkgroupm2`
    FOREIGN KEY (`uid`)
    REFERENCES `metube`.`user` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`groupTopics`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`groupTopics` ;

CREATE TABLE IF NOT EXISTS `metube`.`groupTopics` (
  `gtId` INT NOT NULL,
  `gtCtreateTime` DATETIME NOT NULL,
  `gtTitle` VARCHAR(45) NOT NULL,
  `gtContent` VARCHAR(45) NOT NULL,
  `gid` INT NOT NULL,
  PRIMARY KEY (`gtId`),
  INDEX `gid_idx` (`gid` ASC),
  CONSTRAINT `gid1`
    FOREIGN KEY (`gid`)
    REFERENCES `metube`.`group` (`gid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`groupTopicMultifile`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`groupTopicMultifile` ;

CREATE TABLE IF NOT EXISTS `metube`.`groupTopicMultifile` (
  `gtId` INT NOT NULL,
  `mid` INT NOT NULL,
  PRIMARY KEY (`gtId`, `mid`),
  INDEX `fk_idx` (`mid` ASC),
  CONSTRAINT `fkgtmf1`
    FOREIGN KEY (`gtId`)
    REFERENCES `metube`.`groupTopics` (`gtId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkidx1`
    FOREIGN KEY (`mid`)
    REFERENCES `metube`.`multimediaFiles` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`topicsComment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`topicsComment` ;

CREATE TABLE IF NOT EXISTS `metube`.`topicsComment` (
  `tcmId` INT NOT NULL,
  `cmContent` VARCHAR(45) NOT NULL,
  `cmTime` DATETIME NOT NULL,
  `cmReplyId` INT NOT NULL,
  PRIMARY KEY (`tcmId`),
  INDEX `fkcmReplytocmId_idx` (`cmReplyId` ASC),
  CONSTRAINT `fkcmReplytocmId0`
    FOREIGN KEY (`cmReplyId`)
    REFERENCES `metube`.`topicsComment` (`tcmId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`groupTopicComment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`groupTopicComment` ;

CREATE TABLE IF NOT EXISTS `metube`.`groupTopicComment` (
  `gdId` INT NOT NULL,
  `tcmId` INT NOT NULL,
  PRIMARY KEY (`gdId`, `tcmId`),
  CONSTRAINT `fkgtc1`
    FOREIGN KEY (`gdId`)
    REFERENCES `metube`.`topicsComment` (`tcmId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkgtc2`
    FOREIGN KEY (`gdId`)
    REFERENCES `metube`.`groupTopics` (`gtId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`category` ;

CREATE TABLE IF NOT EXISTS `metube`.`category` (
  `cgId` INT NOT NULL,
  `category` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cgId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `metube`.`categoryofFiles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `metube`.`categoryofFiles` ;

CREATE TABLE IF NOT EXISTS `metube`.`categoryofFiles` (
  `mid` INT NOT NULL,
  `cgId` INT NOT NULL,
  PRIMARY KEY (`mid`, `cgId`),
  INDEX `fg_idx` (`cgId` ASC),
  CONSTRAINT `fgcf1`
    FOREIGN KEY (`mid`)
    REFERENCES `metube`.`multimediaFiles` (`mid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fgcf2`
    FOREIGN KEY (`cgId`)
    REFERENCES `metube`.`category` (`cgId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
