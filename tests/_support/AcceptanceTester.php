<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * @Given 開啟伺服器
     */
    public function 開啟伺服器()
    {
        // Do nothing
    }

    /**
     * @When 開啟網頁丟 :name 進去
     */
    public function 開啟網頁($name)
    {
        $this->amOnPage("/hello/$name");
    }

    /**
     * @Then 會看到 :hello
     */
    public function 會看到($hello)
    {
        $this->see($hello);
    }
}
