<?php

\App\Events\OrderPaid::dispatch($transaction->transactionable_id);
