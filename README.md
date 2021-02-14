# soapApp
Aplikacja jest przykładem implementacji API SOAPowego. 
Możemy wykonywać do niej dwa rodzaje requestów:
1. Zapytanie zwracające elementy nalężące do danej części ciała;
2. Zapytanie zwracającego informację czy dany element należy do danej części ciała

Uruchomienie (wymagany jest docker):

1.  Z poziomu folderu projektu uruchom docker compose:
    ```console
    docker-compose up
    ```
2. Do pliku znajdującego się standardowo w /etc/hosts (systemy Unixowe) dodaj następującą linię:
    ```console
    127.0.0.1:80    symfony.localhost
    ```
3. Przejdź w przeglądarce do uruchomiej aplikacji, i wejdź w ścieżkę /create-data - to stworzy wszystkie potrzebne dane
    ```console
    symfony.localhost/create-data
    ``` 
    
Aplikacja jest dostępna pod adresem symfony.localhost, 
SOAP API pod symfony.localhost/dictionary/webservice, 
a plik wsdl pod symfony.localhost/dictionary/webservice?wsdl.

Nazwy metod to getSubParts oraz doesSubpartBelongToPart.
  
I aplikacja jest gotowa!