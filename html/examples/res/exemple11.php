<?php
//dezend by  QQ:2172298892
echo "<div style=\"border: 1px solid rgb(0, 0, 0); margin: 0; padding: 0; background: rgb(255, 255, 255); width: 400px; height: 300px;\">\n    <div style=\"border-style: solid; border-color: transparent rgb(170, 34, 170) rgb(170, 34, 170) transparent; border-width: 18px 56px; position: absolute; left: 111px; top: 69px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: rgb(170, 34, 170) transparent transparent rgb(170, 34, 170); border-width: 18px 9px; position: absolute; left: 223px; top: 69px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: transparent rgb(170, 34, 170) rgb(170, 34, 170) transparent; border-width: 3px 9px; position: absolute; left: 223px; top: 63px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: rgb(170, 34, 170) transparent transparent rgb(170, 34, 170); border-width: 3px 1.5px; position: absolute; left: 241px; top: 63px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: transparent rgb(170, 34, 170) rgb(170, 34, 170) transparent; border-width: 0.5px 1.5px; position: absolute; left: 241px; top: 62px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: rgb(170, 34, 170) rgb(170, 34, 170) transparent transparent; border-width: 67px 22px; position: absolute; left: 111px; top: 105px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: rgb(170, 34, 170) transparent transparent rgb(170, 34, 170); border-width: 67px 34px; position: absolute; left: 155px; top: 105px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: transparent rgb(34, 170, 170) rgb(34, 170, 170) transparent; border-width: 67px 33.5px; position: absolute; left: 178px; top: 61px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: transparent transparent rgb(34, 170, 170) rgb(34, 170, 170); border-width: 67px 22px; position: absolute; left: 245px; top: 61px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: rgb(34, 170, 170) transparent transparent rgb(34, 170, 170); border-width: 18px 55.5px; position: absolute; left: 178px; top: 195px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: transparent rgb(34, 170, 170) rgb(34, 170, 170) transparent; border-width: 18px 9px; position: absolute; left: 160px; top: 195px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: rgb(34, 170, 170) transparent transparent rgb(34, 170, 170); border-width: 3px 9px; position: absolute; left: 160px; top: 231px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: transparent rgb(34, 170, 170) rgb(34, 170, 170) transparent; border-width: 3px 1.5px; position: absolute; left: 157px; top: 231px; height: 0pt; width: 0pt;\"></div><div style=\"border-style: solid; border-color: rgb(34, 170, 170) transparent transparent rgb(34, 170, 170); border-width: 0.5px 1.5px; position: absolute; left: 157px; top: 237px; height: 0pt; width: 0pt;\"></div>\n</div>\n<hr>\n<table style=\"width:100%;\">\n    <tr>\n        <td id=\"mon_td_trop_grand\" style=\"width:100%;\">\n            Test de TD très grand, en désactivant le test de TD ne devant pas depasser une page<br>\n            via la méthode <b>setTestTdInOnePage</b>.<br>\n            <table style=\"width:100%;\">\n";

for ($i = 0; $i <= 40; $i++) {
	echo "                <tr>\n                    <td style=\"border:1px solid red;width:100%;\">\n                        test de texte assez long pour engendrer des retours à la ligne automatique...\n                        a b c d e f g h i j k l m n o p q r s t u v w x y z\n                        a b c d e f g h i j k l m n o p q r s t u v w x y z\n                    </td>\n                </tr>\n";
}

echo "            </table>\n        </td>\n    </tr>\n</table>";

?>
