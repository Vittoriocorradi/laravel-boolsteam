Progetto Games

model-migration-seeder-controller

Installazione progetto laravel da template e installazione di partenza
Collegare un database
Creare la struttura della tabella games -> migrations -> games

title
image
description
price
genre
developer
publisher   
release_date
score
original_language
available_language


Creare un modello per la gestione dei dati -> Game
Filliamo la tabella con informazioni Fake (faker)
Creiamo un controller -> Admin/GameController - resource controller
Creiamo le rotte relative al controller --resource
view

layout
partials -> header e footer
games/ -- index -- show -- create -- edit
php artisan make:model -cmsrR


Ruoli

Migration
Seeder
CRUD
View
Validation