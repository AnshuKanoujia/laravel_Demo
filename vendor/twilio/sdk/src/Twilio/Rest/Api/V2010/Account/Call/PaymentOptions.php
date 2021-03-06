<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class PaymentOptions {
    /**
     * @param string $bankAccountType If Payment source is ACH, type of bank
     *                                account.
     * @param string $chargeAmount If this field is present and greater than `0.0`
     *                             payment source will be charged.
     * @param string $currency Currency `charge_amount` is in.
     * @param string $description Decription of the charge.
     * @param string $input Kind of medium customer would enter payment source
     *                      information in.
     * @param int $minPostalCodeLength If postal code is expected, minimum length
     *                                 of the postal code.
     * @param array $parameter Additonal data to be sent over to payment provider.
     * @param string $paymentConnector Payment connector that you would like Twilio
     *                                 to use for processing payments.
     * @param string $paymentMethod Payment source type.
     * @param bool $postalCode Whether to expect postal code during payment source
     *                         data gathering.
     * @param bool $securityCode Whether to expect security code during payment
     *                           source data gathering.
     * @param int $timeout The number of seconds that we should allow customer to
     *                     enter payment information
     * @param string $tokenType If tokenization of payment source is desired, this
     *                          represents type of token.
     * @param string $validCardTypes List of card types accepted with each card
     *                               types separated by space.
     * @return CreatePaymentOptions Options builder
     */
    public static function create(string $bankAccountType = Values::NONE, string $chargeAmount = Values::NONE, string $currency = Values::NONE, string $description = Values::NONE, string $input = Values::NONE, int $minPostalCodeLength = Values::NONE, array $parameter = Values::ARRAY_NONE, string $paymentConnector = Values::NONE, string $paymentMethod = Values::NONE, bool $postalCode = Values::NONE, bool $securityCode = Values::NONE, int $timeout = Values::NONE, string $tokenType = Values::NONE, string $validCardTypes = Values::NONE): CreatePaymentOptions {
        return new CreatePaymentOptions($bankAccountType, $chargeAmount, $currency, $description, $input, $minPostalCodeLength, $parameter, $paymentConnector, $paymentMethod, $postalCode, $securityCode, $timeout, $tokenType, $validCardTypes);
    }

    /**
     * @param string $capture Specific payment source information to expect.
     * @param string $status Instruction to complete or cancel the transaction.
     * @return UpdatePaymentOptions Options builder
     */
    public static function update(string $capture = Values::NONE, string $status = Values::NONE): UpdatePaymentOptions {
        return new UpdatePaymentOptions($capture, $status);
    }
}

class CreatePaymentOptions extends Options {
    /**
     * @param string $bankAccountType If Payment source is ACH, type of bank
     *                                account.
     * @param string $chargeAmount If this field is present and greater than `0.0`
     *                             payment source will be charged.
     * @param string $currency Currency `charge_amount` is in.
     * @param string $description Decription of the charge.
     * @param string $input Kind of medium customer would enter payment source
     *                      information in.
     * @param int $minPostalCodeLength If postal code is expected, minimum length
     *                                 of the postal code.
     * @param array $parameter Additonal data to be sent over to payment provider.
     * @param string $paymentConnector Payment connector that you would like Twilio
     *                                 to use for processing payments.
     * @param string $paymentMethod Payment source type.
     * @param bool $postalCode Whether to expect postal code during payment source
     *                         data gathering.
     * @param bool $securityCode Whether to expect security code during payment
     *                           source data gathering.
     * @param int $timeout The number of seconds that we should allow customer to
     *                     enter payment information
     * @param string $tokenType If tokenization of payment source is desired, this
     *                          represents type of token.
     * @param string $validCardTypes List of card types accepted with each card
     *                               types separated by space.
     */
    public function __construct(string $bankAccountType = Values::NONE, string $chargeAmount = Values::NONE, string $currency = Values::NONE, string $description = Values::NONE, string $input = Values::NONE, int $minPostalCodeLength = Values::NONE, array $parameter = Values::ARRAY_NONE, string $paymentConnector = Values::NONE, string $paymentMethod = Values::NONE, bool $postalCode = Values::NONE, bool $securityCode = Values::NONE, int $timeout = Values::NONE, string $tokenType = Values::NONE, string $validCardTypes = Values::NONE) {
        $this->options['bankAccountType'] = $bankAccountType;
        $this->options['chargeAmount'] = $chargeAmount;
        $this->options['currency'] = $currency;
        $this->options['description'] = $description;
        $this->options['input'] = $input;
        $this->options['minPostalCodeLength'] = $minPostalCodeLength;
        $this->options['parameter'] = $parameter;
        $this->options['paymentConnector'] = $paymentConnector;
        $this->options['paymentMethod'] = $paymentMethod;
        $this->options['postalCode'] = $postalCode;
        $this->options['securityCode'] = $securityCode;
        $this->options['timeout'] = $timeout;
        $this->options['tokenType'] = $tokenType;
        $this->options['validCardTypes'] = $validCardTypes;
    }

    /**
     * If Payment source is ACH, type of bank account. Can be: `consumer-checking`, `consumer-savings`, `commercial-checking`. The default value is `consumer-checking`.
     *
     * @param string $bankAccountType If Payment source is ACH, type of bank
     *                                account.
     * @return $this Fluent Builder
     */
    public function setBankAccountType(string $bankAccountType): self {
        $this->options['bankAccountType'] = $bankAccountType;
        return $this;
    }

    /**
     * If this field is present and greater than `0.0` payment source will be charged. Otherwise payment source will be tokenized.
     *
     * @param string $chargeAmount If this field is present and greater than `0.0`
     *                             payment source will be charged.
     * @return $this Fluent Builder
     */
    public function setChargeAmount(string $chargeAmount): self {
        $this->options['chargeAmount'] = $chargeAmount;
        return $this;
    }

    /**
     * Currency `charge_amount` is in. It's format should be as specified in [ISO 4127](http://www.iso.org/iso/home/standards/currency_codes.htm) format. The default value is `USD`.
     *
     * @param string $currency Currency `charge_amount` is in.
     * @return $this Fluent Builder
     */
    public function setCurrency(string $currency): self {
        $this->options['currency'] = $currency;
        return $this;
    }

    /**
     * Decription of the charge.
     *
     * @param string $description Decription of the charge.
     * @return $this Fluent Builder
     */
    public function setDescription(string $description): self {
        $this->options['description'] = $description;
        return $this;
    }

    /**
     * Kind of medium customer would enter payment source information in. Currently only 'DTMF' is supported, which means customer would use keypad of their phone to enter card number etc.
     *
     * @param string $input Kind of medium customer would enter payment source
     *                      information in.
     * @return $this Fluent Builder
     */
    public function setInput(string $input): self {
        $this->options['input'] = $input;
        return $this;
    }

    /**
     * If postal code is expected, minimum length of the postal code. When user enters postal code, this value will be used to validate.
     *
     * @param int $minPostalCodeLength If postal code is expected, minimum length
     *                                 of the postal code.
     * @return $this Fluent Builder
     */
    public function setMinPostalCodeLength(int $minPostalCodeLength): self {
        $this->options['minPostalCodeLength'] = $minPostalCodeLength;
        return $this;
    }

    /**
     * Additonal data to be sent over to payment provider. It has to be a JSON string with only one level object. This parameter can be used to send information such as customer name, phone number etc. Refer to specific payment provider's documentation in Twilio console for supported names/values/format.
     *
     * @param array $parameter Additonal data to be sent over to payment provider.
     * @return $this Fluent Builder
     */
    public function setParameter(array $parameter): self {
        $this->options['parameter'] = $parameter;
        return $this;
    }

    /**
     * Payment connector that you would like Twilio to use for processing payments. The default value is `Default`, which means you need to have at least one payment connector configured in Twilio with name 'Default'. If not you must provide connector configuration name here.
     *
     * @param string $paymentConnector Payment connector that you would like Twilio
     *                                 to use for processing payments.
     * @return $this Fluent Builder
     */
    public function setPaymentConnector(string $paymentConnector): self {
        $this->options['paymentConnector'] = $paymentConnector;
        return $this;
    }

    /**
     * Payment source type. Can be: `credit-card`, `ach-debit`. The default value is `credit-card`.
     *
     * @param string $paymentMethod Payment source type.
     * @return $this Fluent Builder
     */
    public function setPaymentMethod(string $paymentMethod): self {
        $this->options['paymentMethod'] = $paymentMethod;
        return $this;
    }

    /**
     * Whether to expect postal code during payment source data gathering. Can be: `true`, `false`. The default value is `true`.
     *
     * @param bool $postalCode Whether to expect postal code during payment source
     *                         data gathering.
     * @return $this Fluent Builder
     */
    public function setPostalCode(bool $postalCode): self {
        $this->options['postalCode'] = $postalCode;
        return $this;
    }

    /**
     * Whether to expect security code during payment source data gathering. Can be: `true`, `false`. The default value is `true`.
     *
     * @param bool $securityCode Whether to expect security code during payment
     *                           source data gathering.
     * @return $this Fluent Builder
     */
    public function setSecurityCode(bool $securityCode): self {
        $this->options['securityCode'] = $securityCode;
        return $this;
    }

    /**
     * The number of seconds that we should allow customer to enter payment information. Can be an integer between `5` and `600`, inclusive. The default value is `5`.
     *
     * @param int $timeout The number of seconds that we should allow customer to
     *                     enter payment information
     * @return $this Fluent Builder
     */
    public function setTimeout(int $timeout): self {
        $this->options['timeout'] = $timeout;
        return $this;
    }

    /**
     * If tokenization of payment source is desired, this represents type of token. Can be: `one-time`, `reusable`. The default value is `reusable`.
     *
     * @param string $tokenType If tokenization of payment source is desired, this
     *                          represents type of token.
     * @return $this Fluent Builder
     */
    public function setTokenType(string $tokenType): self {
        $this->options['tokenType'] = $tokenType;
        return $this;
    }

    /**
     * List of card types accepted with each card types separated by space. Can be: `visa`,`nmastercard`,`amex`,`maestro`,`discover`,`optima`,`jcb`,`diners-club`,`enroute`. The default value is `visa mastercard amex`.
     *
     * @param string $validCardTypes List of card types accepted with each card
     *                               types separated by space.
     * @return $this Fluent Builder
     */
    public function setValidCardTypes(string $validCardTypes): self {
        $this->options['validCardTypes'] = $validCardTypes;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Api.V2010.CreatePaymentOptions ' . $options . ']';
    }
}

class UpdatePaymentOptions extends Options {
    /**
     * @param string $capture Specific payment source information to expect.
     * @param string $status Instruction to complete or cancel the transaction.
     */
    public function __construct(string $capture = Values::NONE, string $status = Values::NONE) {
        $this->options['capture'] = $capture;
        $this->options['status'] = $status;
    }

    /**
     * Specific payment source information to expect. Can be: `payment-card-number`,`expiration-date`,`security-code`,`postal-code`,`bank-routing-number`,`bank-account-number`.
     *
     * @param string $capture Specific payment source information to expect.
     * @return $this Fluent Builder
     */
    public function setCapture(string $capture): self {
        $this->options['capture'] = $capture;
        return $this;
    }

    /**
     * Instruction to complete or cancel the transaction. Can be: `complete`, `cancel.`
     *
     * @param string $status Instruction to complete or cancel the transaction.
     * @return $this Fluent Builder
     */
    public function setStatus(string $status): self {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Api.V2010.UpdatePaymentOptions ' . $options . ']';
    }
}