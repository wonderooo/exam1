# Projekt egzaminacyjny

2022-04-28 - 8:00 - 11:30

## Cel projektu

- wykonanie aplikacji Web 

- prezentacja znajomości HTML, CSS oraz PHP

- podstawowa umiejętność korzystania z Git

## Wymagane narzędzia i biblioteki

- Apache

- PHP 8

- MySQL

- Visual Studio Code

- Bootstrap 5

- PHPfaker

- Strona picsum photos

- Github
  
  - commits
  
  - tags

## Wymagane elementy drzewa plików projektu

```bash
./images/
./.gitignore
./dbstructure.sql
./generate.php
./index.php
./style.css
./view.php
```

## Roadmap

Do oznaczania releasów używamy tagów

### Release 0.1

- wykonaj stronę "w trakcie tworzenia", tzw. under construction

- użytkownik poza informacją o tworzeniu strony ma po odświeżeniu pokazywać aktualną datę i godzinę (z dokładnością do sekundy) - korzystamy z właściwej funkcji PHP

### Release 0.2

- utwórz katalog `./images` 

- utwórz bazę danych z jedną tabelą `images` z kolumnami:
  
  - id
  
  - name
  
  - picsum_id
  
  - imagefile
  
  - author
  
  - width
  
  - height
  
  - added_at

- w pliku `generate.php` napisz generator rekordów w bazie danych, który ma wygenerować 20 fake'owych rekordów z następującymi danymi:
  
  - id - autoincrement
  
  - name - nazwa dwuwyrazowa wygenerowana z wykorzystaniem https://fakerphp.github.io/
  
  - picsum_id - losowa, unikalna dla Twojej bazy liczba naturalna w zakresie 0-1000
  
  - imagefile - nazwa pliku identyczna jak name, ale zapisana w formacie snake_case + rozszerzenie - dla każdego rekordu pobierz i zapisz plik w katalogu `./images`
  
  - author, width, height - dane pobrane z metadanych z picsum https://picsum.photos/id/{picsum_id}/info
  
  - added_at - aktualny timestamp w formacie `Y-m-d H:i:s`

- wyeksportuj do pliki `dbstructure.sql` strukturę utworzonej bazy danych (bez danych)

### Release 0.3

- zamiast strony under construction zaprojektuj stronę główną galerii zdjęć na której oprócz informacji ogólnej wyświetl rekordy z bazy - zdjęcie, nazwę oraz autora - wykorzystuj oczywiście zdjęcia pobrane lokalnie

- format wyświetlenia to siatka elementów z czterema rekordami w wierszu

### Release 0.4

- na stronie głównej galerii dodaj możliwość klikania w rekord

- po kliknięciu w rekord na stronie głównej użytkownik przechodzi na podstronę `view.php` danego rekordu

- na podstronie view użytkownik widzi duże zdjęcie oraz wszystkie pozostałe dane rekordu

- użytkownik ma możliwość powrotu do strony głównej

### Release 0.5

- na podstronie view użytkownik ma możliwość przejścia do następnego i poprzedniego zdjęcia

- przechodzenie działa na zasadzie pętli, więc gdy wyświetla pierwszy rekord, to przejście do poprzedniego zdjęcia przenosi go do ostatniego

### Release 0.6

- na stronie głównej dodaj paging - na stronie jednocześnie ma się pojawić 8 rekordów

- paging ma działać dla dowolnej liczby rekordów w bazie

### Release 0.7

- przy powrocie z view dla danego rekordu upewnij się, że użytkownik wraca na właściwą stronę zdjęć (czyli do tej 8-mki zdjęć, w której znajduje się zdjęcie, z którego wraca do strony głównej)






