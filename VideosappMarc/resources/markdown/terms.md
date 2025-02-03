# Guia del Projecte

## Descripció del Projecte
Aquest projecte és una plataforma de vídeos que permet als usuaris pujar, veure i gestionar vídeos. Els usuaris poden crear comptes, iniciar sessió, i accedir a una varietat de vídeos organitzats per categories.

## Sprint 1
En el primer sprint, ens vam centrar en establir la base del projecte:
- Configuració de l'entorn de desenvolupament.
- Creació de l'estructura inicial del projecte.
- Implementació de l'autenticació d'usuaris.
- Creació de les migracions i models per als vídeos.
- Desenvolupament de les primeres vistes per a la gestió de vídeos.

## Sprint 2
En el segon sprint, vam ampliar les funcionalitats del projecte:
- Implementació de la pujada i emmagatzematge de vídeos.
- Creació de les vistes per a la visualització de vídeos.
- Desenvolupament de proves unitàries i funcionals per assegurar la qualitat del codi.
- Optimització del rendiment i millores en la interfície d'usuari.


## Sprint 3

En el tercer sprint, hem realitzat les següents tasques:

- **Gestió de Vídeos**:
    - S'ha creat el controlador `VideosManageController`.
    - S'han implementat les proves `VideosManageControllerTest` per verificar els permisos de gestió de vídeos.
    - S'han afegit proves per a la visualització de vídeos en `VideosTest`.

- **Usuaris i Rols**:
    - S'han creat els rols `Super Admin`, `Video Manager` i `Regular User`.
    - S'han assignat els permisos corresponents a cada rol.
    - S'ha implementat la prova `UserTest` per verificar la funció `isSuperAdmin()`.

- **Personalització de Stubs**:
    - S'han publicat i personalitzat els stubs de Laravel per adaptar-los a les necessitats del projecte.
