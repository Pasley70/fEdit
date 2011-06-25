fEdit v 0.1
------------------------------------------------------------------------
Hinweise zur Bearbeitung
------------------------------------------------------------------------
Tastaturbefehle im Ansichts-Modus:

Bold: Cmd-b Italic: Cmd-i Copy: Cmd-c Paste: Cmd-p Undo: Cmd-z Redo:
Cmd-y Eine Zeilenschaltung setzt immer ein logisch folgendes
Block-Element (<p>, <li> etc.). Soft-Breaks (<br>) müssen im HTML-Modus
gesetzt werden.

------------------------------------------------------------------------
HTML-Datei in "fEdit.html" laden

Durch Angabe des Dateinamens in der URL bei Aufruf des Editors
"fEdit.html" wird die Datei sofort angezeigt und editierbar:

fEdit.html?filename=Filename.html

------------------------------------------------------------------------
Konfiguration

Anpassungen werden in der Datei "js/fEdit_config.js" vorgenommen.

Root-Verzeichnis der zu bearbeitenden Dateien (optional):

filepath = '/forms/' filepath = '/index.html' [Angabe einer speziellen
Datei] Script, an welches der POST-Request gesendet werden soll
('save'):

savecgi = 'savedata.php' Post-Variablen, die an das Script gesendet
werden:

fdata = [string] HTML-Markup, ISO-8859-1 kompatible Zeichen und
HTML-Entities fname = [string] Filename

------------------------------------------------------------------------
Speichern-Funktion (Script, welches in 'savecgi' angegeben wurde)

Das in PHP geschriebene Beispielscript verfährt wie folgt:

Post-Variablen 'fdata' und 'fname' entgegen nehmen Slashes aus 'fdata'
entfernen Kopie der Datei 'fname' im Verzeichnis 'backup' nach dem
Schema filename_datumuhrzeit.mime erstellen Inhalt von 'fdata' in
'fname' schreiben Wird Text ausgegeben, wird dieser in auf der Seite
'fEdit.html' in einer altert-Box ausgegeben und man gelangt wieder zum
Editor.

Wird kein Text ausgegeben, wird 'fEdit.html' geschlossen und die
index-Datei aufgerufen.

------------------------------------------------------------------------
Getestete Browser

Firefox 2.1 (Mac) Safari 3 (Mac)
