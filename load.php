<?php
global $wpdb;
$user_count = $wpdb->get_var( "show tables like 'dgpc_herramienta'");
if(count($user_count)==0){
  try {
    $con = new PDO("mysql:host=".$wpdb->dbhost.";dbname=".$wpdb->dbname,$wpdb->dbuser,$wpdb->dbpassword);
      $con->query(
          "
              SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
              SET time_zone = '+00:00';

              /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
              /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
              /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
              /*!40101 SET NAMES utf8mb4 */;


              CREATE TABLE `dgpc_ambitoaplicacion` (
                `idambito` int(11) NOT NULL,
                `nombre` varchar(255) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_ambitoherramienta` (
                `idambito` int(11) NOT NULL,
                `idherramienta` int(11) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_area` (
                `idarea` int(11) NOT NULL,
                `nombre` varchar(165) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_claseherramienta` (
                `idclase` int(11) NOT NULL,
                `nombre` varchar(75) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_componente` (
                `idcomponente` int(11) NOT NULL,
                `idarea` int(11) DEFAULT NULL,
                `nombre` varchar(150) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_contacto` (
                `idcontacto` int(11) NOT NULL,
                `nombre` varchar(40) DEFAULT NULL,
                `cargo` varchar(60) DEFAULT NULL,
                `telefono` varchar(15) DEFAULT NULL,
                `email` varchar(65) DEFAULT NULL,
                `website` varchar(255) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_contactoherramienta` (
                `idcontacto` int(11) NOT NULL,
                `idherramienta` int(11) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_criteriovalidacion` (
                `idcriterio` int(11) NOT NULL,
                `nombre` varchar(255) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_grupoherramienta` (
                `idgrupo` int(11) NOT NULL,
                `idherramienta` int(11) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_grupovulnerable` (
                `idgrupo` int(11) NOT NULL,
                `nombre` varchar(200) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_herramienta` (
                `idherramienta` int(11) NOT NULL,
                `nombre` varchar(255) NOT NULL,
                `objetivo` varchar(255) NOT NULL,
                `idinstitucionelaboro` int(11) NOT NULL,
                `lugarelaboracion` varchar(255) NOT NULL,
                `fechaelaboracion` date NOT NULL,
                `lugaractualizacion` varchar(255) NOT NULL,
                `fechaactualizacion` date NOT NULL,
                `idinstitucionpresenta` int(11) NOT NULL,
                `idcomponente` int(11) NOT NULL,
                `idtipoherramienta` int(11) NOT NULL,
                `idclaseherramienta` int(11) NOT NULL,
                `idioma` varchar(45) DEFAULT NULL,
                `pais` varchar(45) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_herramientaincluye` (
                `iditem` int(11) NOT NULL,
                `idherramienta` int(11) NOT NULL,
                `pregunta` text NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_institucion` (
                `idinstitucion` int(11) NOT NULL,
                `nombre` varchar(255) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_itemincluye` (
                `iditem` int(11) NOT NULL,
                `nombre` varchar(65) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_preguntaherramienta` (
                `idpregunta` int(11) NOT NULL,
                `idherramienta` int(11) NOT NULL,
                `respuesta` text NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_preguntas` (
                `idpregunta` int(11) NOT NULL,
                `pregunta` varchar(255) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_publicacion` (
                `idpublicacion` int(11) NOT NULL,
                `idherramienta` int(11) NOT NULL,
                `archivo` varchar(255) NOT NULL,
                `portada` varchar(255) DEFAULT NULL,
                `tipoarchivo` varchar(45) DEFAULT NULL,
                `fechaPublicacion` date DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_tipoherramienta` (
                `idtipo` int(11) NOT NULL,
                `nombre` varchar(65) DEFAULT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `dgpc_validacion` (
                `idcriterio` int(11) NOT NULL,
                `idherramienta` int(11) NOT NULL,
                `descripcion` text
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
              ");
          $con->query("
                ALTER TABLE `dgpc_ambitoaplicacion`
                ADD PRIMARY KEY (`idambito`);

              ALTER TABLE `dgpc_ambitoherramienta`
                ADD PRIMARY KEY (`idambito`,`idherramienta`),
                ADD KEY `idherramienta_idx` (`idherramienta`);

              ALTER TABLE `dgpc_area`
                ADD PRIMARY KEY (`idarea`);

              ALTER TABLE `dgpc_claseherramienta`
                ADD PRIMARY KEY (`idclase`);

              ALTER TABLE `dgpc_componente`
                ADD PRIMARY KEY (`idcomponente`),
                ADD KEY `idareacom_idx` (`idarea`);

              ALTER TABLE `dgpc_contacto`
                ADD PRIMARY KEY (`idcontacto`);

              ALTER TABLE `dgpc_contactoherramienta`
                ADD PRIMARY KEY (`idcontacto`,`idherramienta`),
                ADD KEY `idherramientacon_idx` (`idherramienta`);

              ALTER TABLE `dgpc_criteriovalidacion`
                ADD PRIMARY KEY (`idcriterio`);

              ALTER TABLE `dgpc_grupoherramienta`
                ADD PRIMARY KEY (`idgrupo`,`idherramienta`),
                ADD KEY `idherramienta2_idx` (`idherramienta`);

              ALTER TABLE `dgpc_grupovulnerable`
                ADD PRIMARY KEY (`idgrupo`);

              ALTER TABLE `dgpc_herramienta`
                ADD PRIMARY KEY (`idherramienta`),
                ADD KEY `nombre` (`nombre`),
                ADD KEY `instelaboro_idx` (`idinstitucionelaboro`),
                ADD KEY `idclaseher_idx` (`idclaseherramienta`),
                ADD KEY `idinstpresenta_idx` (`idinstitucionpresenta`),
                ADD KEY `idcompo_idx` (`idcomponente`),
                ADD KEY `idtipherr_idx` (`idtipoherramienta`);

              ALTER TABLE `dgpc_herramientaincluye`
                ADD PRIMARY KEY (`iditem`,`idherramienta`),
                ADD KEY `idherramienta_idx` (`idherramienta`),
                ADD KEY `idherramienta_idx3` (`idherramienta`);

              ALTER TABLE `dgpc_institucion`
                ADD PRIMARY KEY (`idinstitucion`);

              ALTER TABLE `dgpc_itemincluye`
                ADD PRIMARY KEY (`iditem`);

              ALTER TABLE `dgpc_preguntaherramienta`
                ADD PRIMARY KEY (`idpregunta`,`idherramienta`),
                ADD KEY `herrapregun_idx` (`idherramienta`);

              ALTER TABLE `dgpc_preguntas`
                ADD PRIMARY KEY (`idpregunta`);

              ALTER TABLE `dgpc_publicacion`
                ADD PRIMARY KEY (`idpublicacion`),
                ADD KEY `idherramientapub_idx` (`idherramienta`);

              ALTER TABLE `dgpc_tipoherramienta`
                ADD PRIMARY KEY (`idtipo`);

              ALTER TABLE `dgpc_validacion`
                ADD PRIMARY KEY (`idcriterio`,`idherramienta`),
                ADD KEY `idheramienta_idx` (`idherramienta`);


              ALTER TABLE `dgpc_ambitoaplicacion`
                MODIFY `idambito` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_area`
                MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_claseherramienta`
                MODIFY `idclase` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_componente`
                MODIFY `idcomponente` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_contacto`
                MODIFY `idcontacto` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_criteriovalidacion`
                MODIFY `idcriterio` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_grupovulnerable`
                MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_herramienta`
                MODIFY `idherramienta` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_institucion`
                MODIFY `idinstitucion` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_itemincluye`
                MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_preguntas`
                MODIFY `idpregunta` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_publicacion`
                MODIFY `idpublicacion` int(11) NOT NULL AUTO_INCREMENT;
              ALTER TABLE `dgpc_tipoherramienta`
                MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT;

              ALTER TABLE `dgpc_ambitoherramienta`
                ADD CONSTRAINT `idambitoher` FOREIGN KEY (`idambito`) REFERENCES `dgpc_ambitoaplicacion` (`idambito`) ON UPDATE CASCADE,
                ADD CONSTRAINT `idherramienta` FOREIGN KEY (`idherramienta`) REFERENCES `dgpc_herramienta` (`idherramienta`) ON UPDATE CASCADE;

              ALTER TABLE `dgpc_componente`
                ADD CONSTRAINT `idareacomp` FOREIGN KEY (`idarea`) REFERENCES `dgpc_area` (`idarea`) ON UPDATE CASCADE;

              ALTER TABLE `dgpc_contactoherramienta`
                ADD CONSTRAINT `idcontact` FOREIGN KEY (`idcontacto`) REFERENCES `dgpc_contacto` (`idContacto`) ON UPDATE CASCADE,
                ADD CONSTRAINT `idherramientacon` FOREIGN KEY (`idherramienta`) REFERENCES `dgpc_herramienta` (`idherramienta`) ON UPDATE CASCADE;

              ALTER TABLE `dgpc_grupoherramienta`
                ADD CONSTRAINT `idgrupovulherr` FOREIGN KEY (`idgrupo`) REFERENCES `dgpc_grupovulnerable` (`idgrupo`) ON UPDATE CASCADE,
                ADD CONSTRAINT `idherramienta2` FOREIGN KEY (`idherramienta`) REFERENCES `dgpc_herramienta` (`idherramienta`) ON UPDATE CASCADE;

              ALTER TABLE `dgpc_herramienta`
                ADD CONSTRAINT `idclaseher` FOREIGN KEY (`idclaseherramienta`) REFERENCES `dgpc_claseherramienta` (`idclase`) ON UPDATE CASCADE,
                ADD CONSTRAINT `idcompo` FOREIGN KEY (`idcomponente`) REFERENCES `dgpc_componente` (`idcomponente`) ON UPDATE CASCADE,
                ADD CONSTRAINT `idinstelaboro` FOREIGN KEY (`idinstitucionelaboro`) REFERENCES `dgpc_institucion` (`idinstitucion`) ON UPDATE CASCADE,
                ADD CONSTRAINT `idinstpresenta` FOREIGN KEY (`idinstitucionpresenta`) REFERENCES `dgpc_institucion` (`idinstitucion`) ON UPDATE CASCADE,
                ADD CONSTRAINT `idtipherr` FOREIGN KEY (`idtipoherramienta`) REFERENCES `dgpc_tipoherramienta` (`idtipo`) ON UPDATE CASCADE;

              ALTER TABLE `dgpc_herramientaincluye`
                ADD CONSTRAINT `idherramienta3` FOREIGN KEY (`idherramienta`) REFERENCES `dgpc_herramienta` (`idherramienta`) ON UPDATE CASCADE,
                ADD CONSTRAINT `iditemincluyeher` FOREIGN KEY (`iditem`) REFERENCES `dgpc_itemincluye` (`iditem`) ON UPDATE CASCADE;

              ALTER TABLE `dgpc_preguntaherramienta`
                ADD CONSTRAINT `herrapregun` FOREIGN KEY (`idherramienta`) REFERENCES `dgpc_herramienta` (`idherramienta`) ON UPDATE CASCADE,
                ADD CONSTRAINT `pregunherra` FOREIGN KEY (`idpregunta`) REFERENCES `dgpc_preguntas` (`idpregunta`) ON UPDATE CASCADE;

              ALTER TABLE `dgpc_publicacion`
                ADD CONSTRAINT `idherramientapub` FOREIGN KEY (`idherramienta`) REFERENCES `dgpc_herramienta` (`idherramienta`) ON UPDATE CASCADE;

              ALTER TABLE `dgpc_validacion`
                ADD CONSTRAINT `idcriterioval` FOREIGN KEY (`idcriterio`) REFERENCES `dgpc_criteriovalidacion` (`idcriterio`) ON UPDATE CASCADE,
                ADD CONSTRAINT `idheramienta` FOREIGN KEY (`idherramienta`) REFERENCES `dgpc_herramienta` (`idherramienta`) ON UPDATE CASCADE;


              /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
              /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
              /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
            ");
        
   $con = null;
  }catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    //die();
  }
      
}

?>