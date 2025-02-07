<?php

class InternalErrorException extends Exception
{
}
class MissingEntryException extends Exception
{
}
interface FlexmodelsDAO
{
	public function getFlexmodelId($id);

	public function getFlexmodels();
}

?>