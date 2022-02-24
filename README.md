DDoS Projekt
============

Für die Berufschule von Joshua

Donwload:
---------

- PowerShell: `git clone https://github.com/TumTum/ddos-joshua.git`

Server starten:
---------------

- [Docker](https://docs.docker.com/desktop/windows/install/) installieren.
- PowerShell: `docker compose up`

Browser:
-------

Web seite im Browser öffnen
http://127.0.0.1:8090/

Attacke Starten:
----------------

- PowserShell: `docker compose run --rm ddos [Integer: Anzahl der griffe] `
- Beispiel: `docker compose run --rm ddos 1000`

Alles wieder zurücksetzten:
---------------------------

- PowerShell: `docker compose down --volumes --rmi all`
- 
Danach docker wieder beenden.
