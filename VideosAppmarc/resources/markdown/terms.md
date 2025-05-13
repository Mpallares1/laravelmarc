## Descripcio del projecte
El projecte VideosApp és una aplicació web dissenyada per gestionar i visualitzar vídeos. Els usuaris poden crear, veure i gestionar contingut de vídeo. L'aplicació es construeix amb PHP i Laravel, amb l'objectiu de proporcionar una experiència d'usuari perfecta per a la gestió de vídeos.

## Característiques
- Autenticació i gestió d'usuaris
- Creació i gestió de vídeos
- Visualització de vídeos
- Formatar les dates de publicació de vídeo mitjançant la biblioteca de carboni

## Sprint 1
**Creacio d'usuaris**: Creem un usuari amb lo helper `CreacioUsuari`.
**Crear configuracio per defecte**: Creem l'arxiu `defaultusers.php` ante fiquem les credencials dels usuaris per defecte.
**Modificar .env**: Al arxiu `.env` afegim les dades de `defaultusers.php`.
**Creacio test**: Creem un test per comprovar que es poden crear usuaris.

## Sprint 2
1. **Revisio errors**: Arreglar errors de sprints anteriors.
2. **Estructura vidos**: Creem la estructura per a videos, model, controlador, migracions, vistes, etc...
3. **Creacio testos**: Crear testos per a la creacio i format dels videos.
4. **Revisio Larastran**: Instalacio de la llibreria Larastran per a la formatacio de dates i revisio del codi.

## Sprint 3
**Correcció d'errors**: Corregir els errors detectats en el Sprint 2.

**Instal·lació de spatie/laravel-permission**: Instal·lar el paquet spatie/laravel-permission.

**Migració super\_admin**: Crear una migració per afegir el camp super\_admin a la taula dels usuaris.

**Model d’usuaris**:
- Afegir la funció `testedBy()`.
- Afegir la funció `isSuperAdmin()`.

**Helpers**:
- Afegir el superadmin al professor a la funció `create_default_professor`.
- Crear la funció `add_personal_team()` per separar el codi de la creació del team dels usuaris.
- Crear les funcions:
    - `create_regular_user()` amb valors (regular, regular@videosapp.com, 123456789).
    - `create_video_manager_user()` amb valors (Video Manager, videosmanager@videosapp.com, 123456789).
    - `create_superadmin_user()` amb valors (Super Admin, superadmin@videosapp.com, 123456789).
    - `define_gates()`.
    - `create_permissions()`.

**AppServiceProvider**:
- Registrar les polítiques d’autorització a la funció `book`.
- Definir les portes d'accés.

**DatabaseSeeder**:
- Posar els permisos i els usuaris superadmin, regular user i video manager per defecte.

**Publicació de stubs**: Seguir l’exemple de Laravel News.

**Creació de tests**:
- `VideosManageControllerTest` a `tests/Feature/Videos/`:
- `UserTest` a `tests/Unit/`:

## Sprint 4
**Correcció d'errors**: Corregir els errors detectats en el Sprint 3.

**VideosManageController**: S'ha creat el "VideosManageController" amb les funcions següents:
- `testedBy()`
- `index()`
- `store()`
- `show($id)`
- `edit($id)`
- `update($id)`
- `destroy($id)`

**VideosController**: S'ha creat la funció `index()` per llistar tots els vídeos.

**DatabaseSeeder**: S'han afegit 3 vídeos creats en ajudants al "DatabaseSeeder".

**Vistes per al CRUD**: S'han creat les vistes següents per a les operacions CRUD, accessibles només per als usuaris amb els permisos adequats:
- `resources/views/videos/manage/index.blade.php`: Conté la taula CRUD per als vídeos.
- `resources/views/videos/manage/create.blade.php`: Conté el formulari per crear vídeos, amb atributs `data-qa` per facilitar la identificació de la prova.
- `resources/views/videos/manage/edit.blade.php`: Conté el formulari per editar vídeos.
- `resources/views/videos/manage/delete.blade.php`: Conté la confirmació de l'eliminació del vídeo.

**Videos Index View**: Creat `resources/views/videos/index.blade.php` per mostrar tots els vídeos amb enllaços als detalls del vídeo.

**Tests**:
- S'ha modificat `user_with_permissions_can_manage_videos()` per garantir que hi hagi 3 vídeos.
- S'han creat les funcions en el helper per crear permisos de vídeo per a CRUD i assignar-los als usuaris corresponents.

**VideoTest**: Creacio de les següents funcions:
- `user_without_permissions_can_see_default_videos_page`
- `user_with_permissions_can_see_default_videos_page`
- `not_logged_users_can_see_default_videos_page`

**VideosManageControllerTest**: Creacio de les següents funcions:
- `loginAsVideoManager`
- `loginAsSuperAdmin`
- `loginAsRegularUser`
- `user_with_permissions_can_see_add_videos`
- `user_without_videos_manage_create_cannot_see_add_videos`
- `user_with_permissions_can_store_videos`
- `user_without_permissions_cannot_store_videos`
- `user_with_permissions_can_destroy_videos`
- `user_without_permissions_cannot_destroy_videos`
- `user_with_permissions_can_see_edit_videos`
- `user_without_permissions_cannot_see_edit_videos`
- `user_with_permissions_can_update_videos`
- `user_without_permissions_cannot_update_videos`
- `user_with_permissions_can_manage_videos`
- `regular_users_cannot_manage_videos`
- `guest_users_cannot_manage_videos`
- `superadmins_can_manage_videos`

**Routes**: S'han creat les rutes "vídeos/manage" per al CRUD de vídeo amb el middleware corresponent i la ruta d'índex de vídeo.

**Layout**: Modificar la barra de navegacio per afegir les noves rutes

## Sprint 5
**Correcció d'errors**: Corregir els errors detectats en el Sprint 4.

**Validació de contrasenya**: S'ha afegit la validació de contrasenya mínima de 8 caràcters en la creació d'usuaris.

**Imatge de portada del vídeo**: S'ha actualitzat la vista `index` per mostrar la imatge de portada dels vídeos utilitzant la URL de la miniatura de YouTube.

**Helpers**: S'han revisat i actualitzat els helpers per a la creació d'usuaris i equips.

**Rutes**: S'han revisat i actualitzat les rutes per a la gestió de vídeos i usuaris.

**Corregir els errors del 4t sprint**: Corregir els errors del 4t sprint.

**Afegir el camp user\_id a la taula de videos**: Afegir el camp `user_id` a la taula de videos. Per a que al crear un video es guardi l’usuari que l’ha afegit. Per tant, s’haurà de modificar el controller, model, helpers...

**Arreglar tests**: En cas que al modificar el codi falla algun test d’un sprint anterior, s’han d’arreglar.

**UsersManageController**: Crear `usersManageController` en les funcions `testedBy`, `index`, `store`, `edit`, `update`, `delete` i `destroy`.

**UsersController**: Crear la funció `index` i `show` a `usersController`.

**Vistes per al CRUD d'usuaris**: Crear les vistes per al CRUD que només poden veure-ho els que tinguin els permisos adients:
- `resources/views/users/manage/index.blade.php`
- `resources/views/users/manage/create.blade.php`
- `resources/views/users/manage/edit.blade.php`
- `resources/views/users/manage/delete.blade.php`

**Vista index.blade.php**: Afegir la taula del CRUD d’usuaris.

**Vista create.blade.php**: Afegir el formulari per posar els usuaris, s’ha d’utilitzar l’atribut `data-qa` per a que sigui més fàcil identificar per als testos.

**Vista edit.blade.php**: Afegir la taula del CRUD d’usuaris.

**Vista delete.blade.php**: Afegir la confirmació de l’eliminació de l’usuari.

**Vista users/index.blade.php**: Crear la vista `resources/views/users/index.blade.php` on es vegin tots els usuaris i es puguin buscar i al clicar a l’usuari que porti al detall de l’usuari i els seus videos.

**Helpers**: Crear els permisos de gestió dels usuaris per al CRUD i assignar-los als usuaris superadmin.

**UserTest**: Crear les funcions:
- `user_without_permissions_can_see_default_users_page`
- `user_with_permissions_can_see_default_users_page`
- `not_logged_users_cannot_see_default_users_page`
- `user_without_permissions_can_see_user_show_page`
- `user_with_permissions_can_see_user_show_page`
- `not_logged_users_cannot_see_user_show_page`

**UsersManageControllerTest**: Crear les funcions:
- `loginAsVideoManager`
- `loginAsSuperAdmin`
- `loginAsRegularUser`
- `user_with_permissions_can_see_add_users`
- `user_without_users_manage_create_cannot_see_add_users`
- `user_with_permissions_can_store_users`
- `user_without_permissions_cannot_store_users`
- `user_with_permissions_can_destroy_users`
- `user_without_permissions_cannot_destroy_users`
- `user_with_permissions_can_see_edit_users`
- `user_without_permissions_cannot_see_edit_users`
- `user_with_permissions_can_update_users`
- `user_without_permissions_cannot_update_users`
- `user_with_permissions_can_manage_users`
- `regular_users_cannot_manage_users`
- `guest_users_cannot_manage_users`
- `superadmins_can_manage_users`

**Rutes de users/manage**: Crear les rutes de `users/manage` per al CRUD d’usuaris amb el seu middleware correspondent i la ruta de l'índex i el show d’usuaris. Les rutes del CRUD i les de l'índex i show han d'aparèixer només quan estàs logejat.

**Navegació entre pàgines**: S’ha de poder navegar entre pàgines.

**Afegir a resources/markdown/terms**: Afegir el que heu fet al sprint a `resources/markdown/terms`.

**Comprovar en Larastan**: Comprovar en Larastan tots els fitxers que heu creat.

## Sprint 6
**Modificar videos per poder assignar el video a les series**.
**Els regular users han de poder crear videos**. Per tant a VideoController afegirem les funcions del crud per als regular. A la vista de videos s’haurà de crear els botons per al crud.
**Crear migracio series**. Ha de tindre els camps id, title, description, image, user\_name, user\_photo\_url, published\_at.
**Crear el model de series**. Ha de tindre les funcions testedby, videos (per fer la relació 1:N), getFormattedCreatedAtAttribute, getFormattedForHumansCreatedAtAttribute, getCreatedAtTimestampAttribute.
**Al model de videos afegir la relació 1:N**.
**Crear SeriesManageController** en les funcions testedby, index, store, edit, update, delete i destroy.
**Crear SeriesController** en les funcions index i show.
**Crear el model de Serie** amb les funcions testedby, videos, getFormattedCreatedAtAttribute(), getFormattedForHumansCreatedAtAttribute() i getCreatedAtTimestampAttribute().
**Crear la migració de la serie** ha de tenir els camps, id, title, description, image (nullable), user\_name, user\_photo\_url (nullable), published\_at (nullable).
**A helpers crear la funció create\_series()** ha d’haver 3 series.
**Crear les vistes per al CRUD** que només poden veure-ho els que tinguin els permisos adients: `resources/views/series/manage/index.blade.php`, `resources/views/series/manage/create.blade.php`, `resources/views/series/manage/edit.blade.php`, `resources/views/series/manage/delete.blade.php`.
**A la vista index.blade.php**, afegir la taula del CRUD de series.
**A la vista create.blade.php**, afegir el formulari per posar les series, s’ha d’utilitzar l’atribut `data-qa` per a que sigui més fàcil identificar per als testos.
**A la vista edit.blade.php**, afegir la taula del CRUD de series.
**A la vista delete.blade.php**, afegir la confirmació de l’eliminació de les sèries i els videos associats a la serie. (Si no es vol borrar els videos es pot fer que es desassigni la relació).
**Crear la vista de resources/views/series/index.blade.php** on es vegin totes les sèries i es puguin buscar i al clicar a la serie que mostri els videos que té aquella serie.
**A helpers crear els permisos de gestió de les series** per al crud i assignar-los als usuaris superadmin.
**A test/Unit/SerieTest crear la funció**:
- `serie_have_videos()`

**A SeriesManageControllerTest crear les funcions**:
- `loginAsVideoManager`
- `loginAsSuperAdmin`
- `loginAsRegularUser`
- `user_with_permissions_can_see_add_series`
- `user_without_series_manage_create_cannot_see_add_series`
- `user_with_permissions_can_store_series`
- `user_without_permissions_cannot_store_series`
- `user_with_permissions_can_destroy_series`
- `user_without_permissions_cannot_destroy_series`
- `user_with_permissions_can_see_edit_series`
- `user_without_permissions_cannot_see_edit_series`
- `user_with_permissions_can_update_series`
- `user_without_permissions_cannot_update_series`
- `user_with_permissions_can_manage_series`
- `regular_users_cannot_manage_series`
- `guest_users_cannot_manage_series`
- `videomanagers_can_manage_series`
- `superadmins_can_manage_series`

**Crear les rutes de series/manage** per al CRUD de les series amb el seu middleware correspondent i la ruta de l'índex i el show de series. Les rutes del CRUD i les de l'índex i show han d'aparèixer només quan estàs logejat.
**S’ha de poder navegar entre pàgines**.
**Afegir a resources/markdown/terms** el que heu fet al sprint.
**Comprovar en Larastan** tots els fitxers que heu creat.


## Sprint 7
**Correcció d'errors**: Corregir els errors detectats en el Sprint 6.

**Notificacions**:
- S'ha creat la ruta `/notifications` al fitxer `routes/web.php` per accedir a les notificacions.
- S'ha creat el controlador `NotificationsController` amb la funció `index()` per mostrar la vista de notificacions.
- S'ha creat la vista `resources/views/notifications/index.blade.php` per mostrar les notificacions.

**Events i Notificacions**:
- S'ha creat l'event `VideoCreated` per gestionar la creació de vídeos.
- S'ha creat la notificació `VideoCreatedNotification` per enviar notificacions quan es crea un vídeo.

**Tests**:
- S'ha creat el test `VideoNotificationsTest` a `tests/Feature/` amb les funcions:
    - `test_video_created_event_is_dispatched`: Verifica que l'event `VideoCreated` es dispara quan es crea un vídeo.
    - `test_push_notification_is_sent_when_video_is_created`: Verifica que es genera una notificació quan es crea un vídeo.

**Helpers**:
- S'han revisat i actualitzat els helpers per gestionar les notificacions.

**Rutes**:
- S'han revisat i actualitzat les rutes per incloure la gestió de notificacions.

**Afegir a resources/markdown/terms**: Afegir el que s'ha fet al Sprint 7 a `resources/markdown/terms`.

**Comprovar en Larastan**: Comprovar en Larastan tots els fitxers creats o modificats.
