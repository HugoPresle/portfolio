-- -----------------------------------------------------
-- Schema astar_bdd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `astar_bdd` DEFAULT CHARACTER SET utf8;

USE `astar_bdd`;

DROP USER IF EXISTS 'username'@'localhost';
CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `astar_bdd`.* TO 'username'@'localhost';
FLUSH PRIVILEGES;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Rarity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Rarity`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Rarity` (
    `rarity_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `color` VARCHAR(255) NULL,
    PRIMARY KEY (`rarity_id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Item_Stats`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Item_Stats`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Item_Stats` (
    `item_stats_id` INT NOT NULL AUTO_INCREMENT,
    `bonus` TINYINT NULL,
    `attack` INT NULL,
    `defense` INT NULL,
    `speed` INT NULL,
    `hp` INT NULL,
    PRIMARY KEY (`item_stats_id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Item_Categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Item_Categories`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Item_Categories` (
    `item_categories_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    PRIMARY KEY (`item_categories_id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Item`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Item`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Item` (
    `item_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `price` INT NULL,
    `item_stats` INT NULL,
    `item_categories` INT NULL,
    `item_rarity` INT NULL,
    PRIMARY KEY (`item_id`),
    CONSTRAINT `item_stats` FOREIGN KEY (`item_stats`) REFERENCES `astar_bdd`.`Item_Stats` (`item_stats_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `item_categories` FOREIGN KEY (`item_categories`) REFERENCES `astar_bdd`.`Item_Categories` (`item_categories_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `item_rarity` FOREIGN KEY (`item_rarity`) REFERENCES `astar_bdd`.`Rarity` (`rarity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Monster`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Monster`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Monster` (
    `monster_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `image` TEXT(255) NULL,
    `image_variant` TEXT(255) NULL,

    `base_attack` INT NULL,
    `max_attack` INT NULL,
    `base_defense` INT NULL,
    `max_defense` INT NULL,
    `base_speed` INT NULL,
    `max_speed` INT NULL,
    `base_hp` INT NULL,
    `max_hp` INT NULL,

    `base_rarity` INT NULL,
    PRIMARY KEY (`monster_id`),
    CONSTRAINT `rarity` FOREIGN KEY (`base_rarity`) REFERENCES `astar_bdd`.`Rarity` (`rarity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Monster_Type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Monster_Type`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Monster_Type` (
    `monster_type_id` INT NOT NULL AUTO_INCREMENT,
    `nameType` VARCHAR(45) NULL,
    `weakness` JSON NULL,
    `resistant` JSON NULL,
    `immune` JSON NULL,
    PRIMARY KEY (`monster_type_id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Monster_Type_Relation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Monster_Type_Relation`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Monster_Type_Relation` (
    `monster_type_relation_id` INT NOT NULL AUTO_INCREMENT,
    `monster_id` INT NOT NULL,
    `type_id` INT NOT NULL,
    PRIMARY KEY (`monster_type_relation_id`),
    CONSTRAINT `monster` FOREIGN KEY (`monster_id`) REFERENCES `astar_bdd`.`Monster` (`monster_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `type` FOREIGN KEY (`type_id`) REFERENCES `astar_bdd`.`Monster_Type` (`monster_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Evolve`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Evolve`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Evolve` (
    `evolve_id` INT NOT NULL AUTO_INCREMENT,
    `base_monster` INT NULL,
    `evolve_level` INT NULL,
    `evolved_monster` INT NULL,
    `tokens` INT NULL,
    PRIMARY KEY (`evolve_id`),
    CONSTRAINT `base_monster` FOREIGN KEY (`base_monster`) REFERENCES `astar_bdd`.`Monster` (`monster_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `evolved_monster` FOREIGN KEY (`evolved_monster`) REFERENCES `astar_bdd`.`Monster` (`monster_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `token` FOREIGN KEY (`tokens`) REFERENCES `astar_bdd`.`Item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Dungeon`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Dungeon`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Dungeon` (
    `dungeon_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `dungeon_rarity` INT NULL,
    `stamina_cost` INT NULL,
    `available_days` JSON NULL,
    `loot_table` JSON NULL,
    PRIMARY KEY (`dungeon_id`),
    CONSTRAINT `dungeon_rarity` FOREIGN KEY (`dungeon_rarity`) REFERENCES `astar_bdd`.`Rarity` (`rarity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Image`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Image`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Image` (
    `image_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `image` TEXT(255) NULL,
    PRIMARY KEY (`image_id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Title`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Title`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Title` (
    `title_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    PRIMARY KEY (`title_id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Player`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Player`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Player` (
    `player_id` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NULL,
    `avatar` INT NULL,
    `background` INT NULL,
    `title` INT NULL,

    `lvl` INT NULL,
    `xp` DOUBLE NULL,
    `xp_max` INT NULL,
    `money` INT NULL,
    `gem` INT NULL,

    `stamina` INT NULL,
    `stamina_max` INT NULL,
    `stamina_regen` INT NULL,
    `stamina_regentime` INT NULL,

    `create_time` VARCHAR(255) NOT NULL,
    `last_login` VARCHAR(255) NULL,
    PRIMARY KEY (`player_id`),
    CONSTRAINT `avatar` FOREIGN KEY (`avatar`) REFERENCES `astar_bdd`.`Image` (`image_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `background` FOREIGN KEY (`background`) REFERENCES `astar_bdd`.`Image` (`image_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `title` FOREIGN KEY (`title`) REFERENCES `astar_bdd`.`Title` (`title_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Portal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Portal`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Portal` (
    `portal_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `gem_cost` INT NULL,
    `portal_rarity` INT NULL,
    PRIMARY KEY (`portal_id`),
    CONSTRAINT `portal_rarity` FOREIGN KEY (`portal_rarity`) REFERENCES `astar_bdd`.`Rarity` (`rarity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Portal_Monster`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Portal_Monster`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Portal_Monster` (
    `portal_monster_id` INT NOT NULL AUTO_INCREMENT,
    `portal_id` INT NOT NULL,
    `monster_id` INT NOT NULL,
    `monster_rarity` INT NULL,
    PRIMARY KEY (`portal_monster_id`),
    CONSTRAINT `portal` FOREIGN KEY (`portal_id`) REFERENCES `astar_bdd`.`Portal` (`portal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `portal_monster` FOREIGN KEY (`monster_id`) REFERENCES `astar_bdd`.`Monster` (`monster_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `monster_rarity` FOREIGN KEY (`monster_rarity`) REFERENCES `astar_bdd`.`Rarity` (`rarity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Captured`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Captured`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Captured` (
    `captured_id` INT NOT NULL AUTO_INCREMENT,
    `player_id` INT NOT NULL,
    `monster_id` INT NOT NULL,
    `surname` VARCHAR(255) NULL,
    `level` INT NULL,
    `xp` DOUBLE NULL,
    `hp` INT NULL,
    `attack` INT NULL,
    `defense` INT NULL,
    `speed` INT NULL,
    `rarity` INT NULL,
    `isFavorite` BOOLEAN NULL,
    `isVariant` BOOLEAN NULL,
    PRIMARY KEY (`captured_id`),
    CONSTRAINT `captured_player` FOREIGN KEY (`player_id`) REFERENCES `astar_bdd`.`Player` (`player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `captured_monster` FOREIGN KEY (`monster_id`) REFERENCES `astar_bdd`.`Monster` (`monster_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `captured_rarity` FOREIGN KEY (`rarity`) REFERENCES `astar_bdd`.`Rarity` (`rarity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Captured_Items`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Captured_Items`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Captured_Items` (
    `captured_id` INT NOT NULL,
    `item_id` INT NOT NULL,
    PRIMARY KEY (`captured_id`, `item_id`),
    CONSTRAINT `captured` FOREIGN KEY (`captured_id`) REFERENCES `astar_bdd`.`Captured` (`captured_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `captured_item` FOREIGN KEY (`item_id`) REFERENCES `astar_bdd`.`Items` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Team`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Team` (
    `team_id` INT NOT NULL AUTO_INCREMENT,
    `team_name` VARCHAR(255) NULL,
    `player_id` INT NOT NULL,
    `principal` BOOLEAN NOT NULL,
    PRIMARY KEY (`team_id`),
    CONSTRAINT `team_player` FOREIGN KEY (`player_id`) REFERENCES `astar_bdd`.`Player` (`player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;  

-- -----------------------------------------------------
-- Table `astar_bdd`.`Team_Monster`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Team_Monster`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Team_Monster` (
    `team_monster_id` INT NOT NULL AUTO_INCREMENT,
    `team_id` INT NOT NULL,
    `captured_id` INT NOT NULL,
    `position` INT NULL,
    PRIMARY KEY (`team_monster_id`),
    CONSTRAINT `team` FOREIGN KEY (`team_id`) REFERENCES `astar_bdd`.`Team` (`team_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `team_monster` FOREIGN KEY (`captured_id`) REFERENCES `astar_bdd`.`Captured` (`captured_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Inventory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Inventory`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Inventory` (
    `inventory_id` INT NOT NULL AUTO_INCREMENT,
    `player_id` INT NOT NULL,
    `item_id` INT NOT NULL,
    `quantity` INT NULL,
    `updated_at` VARCHAR(255) NULL,
    `created_at` VARCHAR(255) NULL,
    PRIMARY KEY (`inventory_id`),
    CONSTRAINT `inventory_player` FOREIGN KEY (`player_id`) REFERENCES `astar_bdd`.`Player` (`player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `inventory_item` FOREIGN KEY (`item_id`) REFERENCES `astar_bdd`.`Item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Statistiques`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Statistiques`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Statistiques` (
    `stat_id` INT NOT NULL AUTO_INCREMENT,
    `player_id` INT NOT NULL,
    
    `time_played` INT NULL,
    `total_xp` INT NULL,

    `monsters_killed` INT NULL,
    `monsters_captured` INT NULL,
    `monsters_evolved` INT NULL,
    
    `dungeons_cleared` INT NULL,
    `dungeons_failed` INT NULL,
    `dungeons_started` INT NULL,

    `portals_opened` INT NULL,
    
    `items_found` INT NULL,
    `items_sold` INT NULL,
    `items_bought` INT NULL,

    `money_earned` INT NULL,
    `money_spent` INT NULL,

    `gem_earned` INT NULL,
    `gem_spent` INT NULL,

    `stamina_used` INT NULL,
    `stamina_gained` INT NULL,

    `dungeon_completed` INT NULL,
    `dungeon_failed` INT NULL,
    `dungeon_started` INT NULL,

    `quest_completed` INT NULL,
    `quest_failed` INT NULL,
    `quest_started` INT NULL,

    `achievement_completed` INT NULL,
    
    PRIMARY KEY (`stat_id`),
    CONSTRAINT `statistiques_player` FOREIGN KEY (`player_id`) REFERENCES `astar_bdd`.`Player` (`player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `monsters_killed` FOREIGN KEY (`monsters_killed`) REFERENCES `astar_bdd`.`Statistiques_Monster` (`stat_monster_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `monsters_captured` FOREIGN KEY (`monsters_captured`) REFERENCES `astar_bdd`.`Statistiques_Monster` (`stat_monster_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `monsters_evolved` FOREIGN KEY (`monsters_evolved`) REFERENCES `astar_bdd`.`Statistiques_Monster` (`stat_monster_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Statistiques_Monster`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Statistiques_Monster`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Statistiques_Monster` (
    `stat_monster_id` INT NOT NULL AUTO_INCREMENT,
    `text` VARCHAR(255) NULL,

    `acier` INT NULL,
    `eau` INT NULL,
    `feu` INT NULL,
    `plante` INT NULL,
    `electrique` INT NULL,
    `glace` INT NULL,
    `insecte` INT NULL,
    `vol` INT NULL,
    `poison` INT NULL,
    `psy` INT NULL,
    `sol` INT NULL,
    `roche` INT NULL,
    `spectre` INT NULL,
    `tenebre` INT NULL,
    `dragon` INT NULL,
    `fée` INT NULL,
    PRIMARY KEY (`stat_monster_id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Difficulty`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Difficulty`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Difficulty` (
    `difficulty_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    PRIMARY KEY (`difficulty_id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Quest_Requirement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Quest_Requirement`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Quest_Requirement` (
    `quest_requirement_id` INT NOT NULL AUTO_INCREMENT,
    `item_id` INT NOT NULL,
    `quantity` INT NULL,
    `lvl_min` INT NULL, 
    PRIMARY KEY (`quest_requirement_id`),
    CONSTRAINT `requirement_item` FOREIGN KEY (`item_id`) REFERENCES `astar_bdd`.`Item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Quest`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Quest`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Quest` (
    `quest_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `difficulty` INT NULL,
    `requirements` INT NULL,
    PRIMARY KEY (`quest_id`),
    CONSTRAINT `difficulty` FOREIGN KEY (`difficulty`) REFERENCES `astar_bdd`.`Difficulty` (`difficulty_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `requirements` FOREIGN KEY (`requirements`) REFERENCES `astar_bdd`.`Quest_Requirement` (`quest_requirement_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Quest_Reward`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Quest_Reward`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Quest_Reward` (
    `quest_reward_id` INT NOT NULL AUTO_INCREMENT,
    `quest_id` INT NOT NULL,
    `item_id` INT NOT NULL,
    `quantity` INT NULL,
    PRIMARY KEY (`quest_reward_id`),
    CONSTRAINT `reward_quest` FOREIGN KEY (`quest_id`) REFERENCES `astar_bdd`.`Quest` (`quest_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `reward_quest_item` FOREIGN KEY (`item_id`) REFERENCES `astar_bdd`.`Item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Quest_Player`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Quest_Player`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Quest_Player` (
    `player_id` INT NOT NULL,
    `quest_id` INT NOT NULL,
    `progress` INT NULL,
    `completed` BOOLEAN NULL,
    PRIMARY KEY (`player_id`, `quest_id`),
    CONSTRAINT `quest_player` FOREIGN KEY (`player_id`) REFERENCES `astar_bdd`.`Player` (`player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `quest` FOREIGN KEY (`quest_id`) REFERENCES `astar_bdd`.`Quest` (`quest_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Achievement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Achievement`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Achievement` (
    `achievement_id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `total_completion` INT NULL,
    `requirements` JSON NULL,
    PRIMARY KEY (`achievement_id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Achievement_Reward`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Achievement_Reward`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Achievement_Reward` (
    `achievement_reward_id` INT NOT NULL AUTO_INCREMENT,
    `achievement_id` INT NOT NULL,
    `item_id` INT NOT NULL,
    `quantity` INT NULL,
    PRIMARY KEY (`achievement_reward_id`),
    CONSTRAINT `reward_achievement` FOREIGN KEY (`achievement_id`) REFERENCES `astar_bdd`.`Achievement` (`achievement_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `reward_achievement_item` FOREIGN KEY (`item_id`) REFERENCES `astar_bdd`.`Item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `astar_bdd`.`Achievement_Player`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `astar_bdd`.`Achievement_Player`;
CREATE TABLE IF NOT EXISTS `astar_bdd`.`Achievement_Player` (
    `player_id` INT NOT NULL,
    `achievement_id` INT NOT NULL,
    `progress` INT NULL,
    `completed` BOOLEAN NULL,
    PRIMARY KEY (`player_id`, `achievement_id`),
    CONSTRAINT `achievement_player` FOREIGN KEY (`player_id`) REFERENCES `astar_bdd`.`Player` (`player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `achievement` FOREIGN KEY (`achievement_id`) REFERENCES `astar_bdd`.`Achievement` (`achievement_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;
