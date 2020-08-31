<?php

	function extract_cards($buf)
	{
		$cards_list_unsplit = $buf;
		$cards_list_unsplit = trim($cards_list_unsplit);

		if($cards_list_unsplit[0] == "[") $cards_list_unsplit = substr($cards_list_unsplit, 1);
		if($cards_list_unsplit[ strlen($cards_list_unsplit) - 1  ] == "]") $cards_list_unsplit = substr($cards_list_unsplit, 0, -1);

		$cards_list_split = explode(",", $cards_list_unsplit);

		$cards_array = [];

		if(sizeof($cards_list_split) >= 1)
		{

			if($cards_list_split[0] != "")
			{

				foreach ($cards_list_split as $key) {
				$item_split_list = explode("'", $key);
				$card_code = trim($item_split_list[1]);
				array_push($cards_array, $card_code);
			}

			}

		}

		return $cards_array;

	}




?>