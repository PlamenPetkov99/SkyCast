<?php

namespace App\Dto;

class ReversedGeoResponseDto
{
    private ?float $latitude;
    private ?string $lookupSource;
    private ?float $longitude;
    private ?string $localityLanguageRequested;
    private ?string $continent;
    private ?string $continentCode;
    private ?string $countryName;
    private ?string $countryCode;
    private ?string $principalSubdivision;
    private ?string $principalSubdivisionCode;
    private ?string $city;
    private ?string $locality;
    private ?string $postcode;
    private ?string $plusCode;
    private ?array $localityInfo;

    public function __construct(){}

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLookupSource(): ?string
    {
        return $this->lookupSource;
    }

    public function setLookupSource(?string $lookupSource): void
    {
        $this->lookupSource = $lookupSource;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getLocalityLanguageRequested(): ?string
    {
        return $this->localityLanguageRequested;
    }

    public function setLocalityLanguageRequested(?string $localityLanguageRequested): void
    {
        $this->localityLanguageRequested = $localityLanguageRequested;
    }

    public function getContinent(): ?string
    {
        return $this->continent;
    }

    public function setContinent(?string $continent): void
    {
        $this->continent = $continent;
    }

    public function getContinentCode(): ?string
    {
        return $this->continentCode;
    }

    public function setContinentCode(?string $continentCode): void
    {
        $this->continentCode = $continentCode;
    }

    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    public function setCountryName(?string $countryName): void
    {
        $this->countryName = $countryName;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getPrincipalSubdivision(): ?string
    {
        return $this->principalSubdivision;
    }

    public function setPrincipalSubdivision(?string $principalSubdivision): void
    {
        $this->principalSubdivision = $principalSubdivision;
    }

    public function getPrincipalSubdivisionCode(): ?string
    {
        return $this->principalSubdivisionCode;
    }

    public function setPrincipalSubdivisionCode(?string $principalSubdivisionCode): void
    {
        $this->principalSubdivisionCode = $principalSubdivisionCode;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): void
    {
        $this->locality = $locality;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(?string $postcode): void
    {
        $this->postcode = $postcode;
    }

    public function getPlusCode(): ?string
    {
        return $this->plusCode;
    }

    public function setPlusCode(?string $plusCode): void
    {
        $this->plusCode = $plusCode;
    }

    public function getLocalityInfo(): ?array
    {
        return $this->localityInfo;
    }

    public function setLocalityInfo(?array $localityInfo): void
    {
        $this->localityInfo = $localityInfo;
    }


}
