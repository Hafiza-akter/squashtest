<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AirShoppingController;
use App\Http\Controllers\api\v1\OfferPriceController;
use App\Http\Controllers\api\v1\OrderCancelController;
use App\Http\Controllers\api\v1\OrderChangeController;
use App\Http\Controllers\api\v1\OrderCreateController;
use App\Http\Controllers\api\v1\OrderReshopController;
use App\Http\Controllers\api\v1\ServiceListController;
use App\Http\Controllers\api\v1\OrderRetrieveController;
use App\Http\Controllers\api\v1\SeatAvailabilityController;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/health", function () {
    return response()->json(["message" => "App health is ok."]);
})->name('health');




Route::prefix('ndc/v1')->name("ndc.v1.lh.")->group(function () {
    Route::post("/lh/order_retrieve", OrderRetrieveController::class)->name('order_retrieve');
    Route::post("/lh/air_shopping", AirShoppingController::class)->name('air_shopping');
    Route::post("/lh/offer_price", OfferPriceController::class)->name('offer_price');
    Route::post("/lh/seat_availability", SeatAvailabilityController::class)->name('seat_availability');
    Route::post("/lh/order_change", OrderChangeController::class)->name('order_change');
    Route::post("/lh/order_create", OrderCreateController::class)->name('order_create');
    Route::post("/lh/order_reshop", OrderReshopController::class)->name('order_reshop');
    Route::post("/lh/order_cancel", OrderCancelController::class)->name('order_cancel');
    Route::post("/lh/service_list", ServiceListController::class)->name('service_list');
});
