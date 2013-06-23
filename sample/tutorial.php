<?php
// replace it with your developer key which you can find in your user profile
define("DEVE_KEY", "863akcbb98f7f8e373aeb1b6c3ab263c");
// replace with a valid username
define("USERNAME", "Username");
// replace with a valid password
define("PASSWORD", "Password");


require_once "./ipaste-api-php/iPaste.php";
$ipaste = new iPaste();
$ipaste = new iPaste(DEVE_KEY, USERNAME, PASSWORD);
$tmpKey = $ipaste->login();

$pasteRet = "";
$userPastess = "";
$getPaste = "";
$removePaste = "";

/**
 * Insert new paste
 */
for ($i = 0; 1 === 1 && $i < 1; $i++) {
    try {
        $response = $ipaste->paste(new iPastePaste(null, "iPastetWebServiceIntegrationTest", "Short description", "This is a paste sample!!!'", iPasteIValidStatuses::HIDDEN, "PASSWORD_PASSWORD", "http://www.site.com", "tag1, tag2, tag3", iPasteIValidExpiryDates::ONE_MONTH, iPasteIValidSyntaxes::TEXT, iPasteIValidColors::BLUE), $tmpKey);
        if ($i === 0)
            $pasteRet .= $response;
        else
            $pasteRet .= ", " . $response;
    } catch (iPasteException $e) {
        $pasteRet .= $e;
    }
}
/**
 * Get user pastes
 */
try {
    $response = $ipaste->getUserPastes(iPasteIResponseListFormat::JSON);
    $userPastess .= $response;
} catch (iPasteException $e) {
    $userPastess .= $e;
}
/**
 * Remove an owned paste
 */
try {
    $list = json_decode($userPastess);
    $response = $ipaste->remove(3872);
    $removePaste .= $response;
} catch (iPasteException $e) {
    $removePaste .= $e;

}
/**
 * Get paste
 */
try {

    $response = $ipaste->get($list[0], iPasteIResponsePasteFormat::HTML);
    $getPaste .= $response;
} catch (iPasteException $e) {
    $getPaste .= $e;
}

print "<p>Retrieve tmpKey: $tmpKey</p>";
print "<p>Published paste: " . (is_numeric($pasteRet) ? "<a href=\"http://www.ipaste.eu/view?id=$pasteRet\" target='_blank'>$pasteRet</a>" : "") . "</p>";
print "<p>Retrieve user pastes: $userPastess</p>";
print "<p>Remove paste: $removePaste</p>";
print "<p>Retrieve paste: $getPaste</p>";

