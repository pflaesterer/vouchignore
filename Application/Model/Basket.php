<?php

namespace Pflaesterer\VouchIgnore\Model;

class Basket extends Basket_parent
{
    public function isBelowMinOrderPrice()
    {
        $blIsBelowMinOrderPrice = false;
        $sConfValue = $this->getConfig()->getConfigParam('iMinOrderPrice');
        if (is_numeric($sConfValue) && $this->getProductsCount()) {
            $dMinOrderPrice = \OxidEsales\Eshop\Core\Price::getPriceInActCurrency(( double ) $sConfValue);
            $dNotDiscountedProductPrice = 0;
            if ($oPrice = $this->getNotDiscountProductsPrice()) {
                $dNotDiscountedProductPrice = $oPrice->getBruttoSum();
            }
            // Now get voucher price and add it later, so it's effectivly ignored for this check ("-voucher + voucher = 0")
            $dVoucherPrice = 0;
            if($oVoucherPrice = $this->getVoucherDiscount()) {
                $dVoucherPrice += $oVoucherPrice->getBruttoPrice();
            }
            $dDiscountedProductPriceWithoutVoucher = $this->getDiscountedProductsBruttoPrice() + $dVoucherPrice;
            $blIsBelowMinOrderPrice = ($dMinOrderPrice > ($dDiscountedProductPriceWithoutVoucher + $dNotDiscountedProductPrice));
        }
        
        return $blIsBelowMinOrderPrice;
    }
}
