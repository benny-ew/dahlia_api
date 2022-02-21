<?php

namespace App\Constants;

abstract class TransactionStatus { 

    const OPEN = 'open'; 
    const ONGOING = 'ongoing'; 
    const READY = 'ready'; 
    const CLOSED = 'closed'; 

}