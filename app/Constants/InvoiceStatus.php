<?php

namespace App\Constants;

abstract class InvoiceStatus { 

    const ACTIVE = 'active'; 
    const REPORTED = 'reported'; 
    const PAID = 'paid'; 
    const TENTATIVE_PAID = 'tentative_paid'; 
    const OVERDUE = 'overdue'; 

}