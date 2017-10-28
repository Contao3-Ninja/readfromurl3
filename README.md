# ReadFromUrl3

Contao 3.5 kompatible Version.
Offline-Fork von https://contao.org/de/erweiterungsliste/view/readfromurl.de.html

Contao 2.x Version von Christopher Pleines (chris@pleinesoft.de) 

## Beschreibung

Mit dieser Erweiterung können Sie Inhalt von einer URL laden. Dabei wird zwischen 3 Szenarien unterschieden:

* Sie möchten lediglich den Inhalt einer URL anzeigen
* Sie möchten ein serialisiertes Array einer URL in Ihr Template einbinden
* Sie möchten ein XML-Dokument in Ihr Template einbinden

Außerdem:
* Unterstützung von Insert-Tags in der URL
* Weitergabe von POST und GET Anfragen an die Quell-URL

ReadFromUrl erscheint im Artikel als neues Inhaltselement "Von URL lesen".


## Voraussetzungen

Damit die Erweiterung funktionieren kann, muss es gestattet sein auf entfernte Inhalte via HTTP zuzugreifen.

Dazu muss in der php.ini den Wert **allow_url_fopen = 'On'** gesetzt sein.

**ACHTUNG:** Aus Sicherheitsgründen muss dann in der php.ini der Wert **allow_url_include = 'Off'** gesetzt sein.


## Installation

Installieren Sie die Erweiterung über Composer / die Paketverwaltung oder laden Sie das ZIP-Archiv herunter (Github -> Releases) und kopieren Sie den Ordner readfromurl3-x.y.z nach /system/modules/readfromurl3

ReadFromUrl3 erscheint im Artikel als neues Inhaltselement "Von URL lesen".


## Benutzung - Inhaltsformat wählen

Wählen Sie das Inhaltselement "Von URL lesen". Legen Sie nun das Datenformat der Quelle fest:

* Inhalt: 
  *  Es handelt sich lediglich um den Inhalt einer URL, den Sie anzeigen möchten. Sie können nun noch wählen, ob Sie den Inhalt UTF8 codieren / encodieren möchten.

* Serialisiertes Array: 
  * Tragen Sie hier die URL ein, die ein serialisiertes Array zur Verfügung stellt. Unter PHP könnte diese Datei wie folgt aussehen:

    ```php
    <?php

    $array['one']       = 'Content of one';
    $array['two']       = 'Content of two';
    $array['arr']       = array(1,2,3,4);
    $array['request']   = $GLOBALS['_REQUEST'];

    echo serialize($array);
    ?>
    ```

* XML: 
  * Tragen Sie die URL der XML-Datei ein, z.B. ein RSS-Feed, wie http://www.godmode-trader.de/rss/feeds/trackbox_dtl.xml


## Benutzung - Template wählen

Nun können Sie das Template wählen. ReadFromUrl-Templates beginnen immer mit *rfu_*

* Für Inhalt:

    Wählen Sie das Template *rfu_content*. In aller Regel müssen Sie nichts weiter im Template anpassen.

* Für Serialisiertes Array:

    Wählen Sie das Beispiel-Template *rfu_serialized* und bearbeiten Sie es. Das Array wird im Template als Variable `$this->url_content` eingebunden und kann nun ausgelesen werden.

* Für XML:

    Die angegebene URL wird in ein SimpleXML-Objekt eingelesen, welches unter der Variable `$this->url_content` benutzt werden kann. Mit SimpleXML können Sie das XML-Objekt sehr einfach parsen. Eine Anleitung finden Sie unter http://de.php.net/simplexml


## Benutzung - URL eingeben

Geben Sie nun die URL ein.

In der URL werden Insert-Tags unterstützt. Zu dem gibt es einen zusätzlichen Insert-Tag *request_vars*, mit dem Sie übergebene GET und POST-Variablen an die URL anhängen können:

`http://www.server.de/data.php?{{request_vars}}`


