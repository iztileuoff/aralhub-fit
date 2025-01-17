<?php
    return \App\Models\Order::where('status', 'new')->where('id', $key)->first();