<?php

namespace Doctrine\Tests\ODM\PHPCR\Mapping;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ODM\PHPCR\Mapping\Driver\AnnotationDriver;
use Doctrine\Persistence\Mapping\Driver\MappingDriver;

/**
 * @group mapping
 */
class AnnotationDriverTest extends AbstractMappingDriverTest
{
    protected function loadDriver(): MappingDriver
    {
        $reader = new AnnotationReader();

        return new AnnotationDriver($reader);
    }

    protected function loadDriverForTestMappingDocuments(): MappingDriver
    {
        $annotationDriver = $this->loadDriver();
        $annotationDriver->addPaths([__DIR__.'/Model']);

        return $annotationDriver;
    }

    /**
     * Overwriting private parent properties isn't supported with annotations.
     *
     * @doesNotPerformAssertions
     */
    public function testParentWithPrivatePropertyMapping()
    {
    }
}
