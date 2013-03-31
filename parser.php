<?php
    class parser
    {
        private $_db;

        function __construct()
        {
            $this->_db = new SQLite3('checkin.sqlite', SQLITE3_OPEN_READONLY);

            if(!$this->_db)
            {
                die($error);
            }
        }

        function parseData()
        {
            $query = $this->_db->query("SELECT ID, action, timestamp FROM event");
            while($results[] = $query->fetchArray(SQLITE3_ASSOC));

            $data = [];

            for($i = 1; $i < 8; $i++)
            {
                for($j = 0; $j < 24; $j++)
                {
                    $data[$i][$j] = 0;
                }
            }

            $i = 0;
            while($results[$i])
            {
                if(($results[$i]['action'] == 'check-in') && ($results[$i+1]['action'] == 'check-out'))
                {
                    // do something
                    $checkin = new DateTime('@'.$results[$i]['timestamp']);
                    $checkout = new DateTime('@'.$results[$i+1]['timestamp']);
                    
                    if(($checkout->format('d') - $checkin->format('d')) == 0)
                    {
                        for($j = $checkin->format('G'); $j <= $checkout->format('G'); $j++)
                        {
                            $data[$checkin->format('N')][$j]++;
                        }
                    }
                    else
                    {
                        for($j = $checkin->format('G'); $j <= 23; $j++)
                        {
                            $data[$checkin->format('N')][$j]++;
                        }

                        for($j = 0; $j <= $checkout->format('G'); $j++)
                        {
                            $data[$checkout->format('N')][$j]++;
                        }
                    }
                    $i = $i+2;
                }
                else
                {
                    $i++;
                }
            }

            return $data;
        }
    }
?>
