<?php

/**
 * Sabre_CalDAV_Property_SupportedCalendarComponentSet
 *
 * @package Sabre
 * @copyright Copyright (C) 2007-2010 Rooftop Solutions. All rights reserved.
 * @author Evert Pot (http://www.rooftopsolutions.nl/) 
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */

/**
 * Supported component set property
 *
 * This property is a representation of the supported-component-set property
 * in the CalDAV namespace. It simply requires an array of components, such as
 * VEVENT, VTODO
 */
class Sabre_CalDAV_Property_SupportedCalendarComponentSet extends Sabre_DAV_Property {

    /**
     * components 
     * 
     * @var array 
     */
    private $components;

    /**
     * Creates the property 
     * 
     * @param array $components 
     */
    public function __construct(array $components) {

       $this->components = $components; 

    }
    
    /**
     * Serializes the property in a DOMDocument 
     * 
     * @param Sabre_DAV_Server $server 
     * @param DOMElement $node 
     * @return void
     */
    public function serialize(Sabre_DAV_Server $server,DOMElement $node) {

       $doc = $node->ownerDocument;
       foreach($this->components as $component) {

            $xcomp = $doc->createElement('cal:comp');
            $xcomp->setAttribute('name',$component);
            $node->appendChild($xcomp); 

       }

    }

}
