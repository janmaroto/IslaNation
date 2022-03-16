**Proposta d’una aplicació híbrida**

**Per J. Angel Armengod i Jan Maroto**


# **IslaNation - Islands for you**
Link del [BluePrint](https://app.apiary.io/islanation/editor)

Link del [BackLog](https://docs.google.com/spreadsheets/d/1wyr5TNMpEKw-U9K3Mr5ea6t2_b1Nlw4hF0Sz0pNv6eo/edit?usp=sharing)

**Objectius de l’app**

L’aplicació consisteix en una botiga online, on serà possible exclusivament tant la compra com la venda d’illes per a qualsevol usuari registrat. El portal estarà dedicat a persones inconformistes i/o amb forza poder adquisitiu, que volen comprar un petit territori on imposar la seva llei o, senzillament, aïllar-se de la resta del món.

**Funcionalitats**

- Registre: farà possible el registre per a nous usuaris
- Inici de sessió: posibilita el logatge dels usuaris.
- Donar d’alta: permet ofertar una illa.
- Llistar illes: mostra totes les illes disponibles, per a comprar, o ofertades.
- Filtratge: permet filtrar la llista inicial d’illes per determinats valors.
- Ordenar: les illes, filtrades o no, es podran ordenar ascendent o descendentment per certs valors.
- Mostrar detall: consulta els detalls de l’illa desitjada.
- Compra: permet comprar l’illa objectiu.
- Modificació d'illes: permet modificar els detalls de l’illa objectiu.
- Modificació d'usuari: permet modificar els detalls de l'usuari en ús.
- Eliminació d'illa: permet l’eliminació de l’illa objectiu.
- Eliminació d'usuari: permet eliminar l'usuari en ús.

**Pantalles del Front Office (José)**

Al Front Office es mostren totes les illes en venda amb detalls bàsics a la vista general, i a nivell individual, les seves especificacions, mostrant també l’opció de compra.

- HomePage: mostra un missatge de benvinguda, amb les opcions de registre (canvia de pàgina) i d'inici de sessió.
- Pantalla d'enregistrament: permet registrar-se.
- Pantalla de visualització general: es mostren totes les illes, amb les següents opcions:
  - Filtrar (per nom, area, preu o país): permet reduir el número d'illes amb una busqueda personalitzada.
  - Detall: mostra l'illa en detall (canvia de pantalla).
  - Tancar sessió: tanca la sessió i torna al HomePage.
- Pantalla de detall: mostra l'illa en detall, a més d'oferir l'opció de compra (canvia de pantalla).
- Pantalla de compra: Demana els detalls del compte per a cobrar. Ofereix una opció per a cancelar la compra (torna a la pantalla de detall), i una altra per a confirmar-la (canvia de pantalla).
- Pantalla de confirmació de la compra: mostra un missatge d'enhorabona per la compra.
- Pantalla de detalls d'usuari: mostra els detalls d'aquest amb la possibilitat de canviar-los.


**Pantalles del Back Office (Jan)**

El Back Office tracta i processa les peticions dels usuaris per a donar-se d’alta i penjar les illes que es desitgen posar en venda, en conjunt a les sol·licituds de compra.

- Pantalla d'entrada a l'area privada (login).
- Pantalla de registre.
- Pantalla de editable, dels detalls de l'usuari.
- Llistat de productes (Illes) de l'usuari.
- Pantalla editable, dels detalls de cada producte de l'usuari.
- Pantalla de contactes, de persones interesades per els productes de l'usuari.


**Tecnologies a utilitzar**

- Ionic/Angular: es farà servir per desenvolupar el front end.

- PHP: es farà servir per desenvolupar el back end, seguint aquest un Model Vista Controlador.

- Leaflet: es farà servir per mostrar un mapa amb la ubicació de l'illa a l'app.

- Components propis del mòbil:

  - Càmera: es farà servir per a fer fotos a l'illa a l'hora de ofertar-la.
  - Aplicació de mapes per defecte: es farà servir per a mostrar la ubicació de l'illa a l'aplicació de mapes per defecte.

**Detalls de les illes i dels usuaris**

**Illes**

- Id de l’illa.

- Nom de l’illa.

- Superfície de l’illa en kilòmetres quadrats (àrea).

- Localització de l’illa.

   - Longitud.
   - Latitud.
   - País.

- Data de publicació de l'anunci.

- Fotografies de l’illa (tres com a màxim).

- Bandera de l’illa.

- Preu en euros.

- Propietari.

- Descripció breu de l’illa.

- Visites a l'anunci.

**Usuaris**

- Id de l’usuari.

- Nom d’usuari.

- Correu electrònic.

- Contrasenya.

- Foto de perfil.

Tots els camps serán modificables per l’usuari, a excepció de:

- Id usuari / illa.
- Usuari propietari de l'illa.
- Data de publicació de l'illa.
- Visites de l'illa.
  
  
  
