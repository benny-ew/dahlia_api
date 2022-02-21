<?php

namespace App\Constants;

abstract class ReadType { 

    const ALL = 'ALL'; 
    const ALL_INCLUDE_DELETED = 'ALL_INCLUDE_DELETED'; 
    const ONE = 'ONE'; 
    const PAGINATED = 'PAGINATED'; 
    const FILTERED = 'FILTERED'; 
    const FILTERED_SORTED = 'FILTERED_SORTED';
    const SORTED = 'SORTED'; 
    const PAGINATED_FILTERED = 'PAGINATED_FILTERED'; 
    const PAGINATED_SORTED = 'PAGINATED_SORTED'; 
    const PAGINATED_FILTERED_SORTED = 'PAGINATED_FILTERED_SORTED'; 

}