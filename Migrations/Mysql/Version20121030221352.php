<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Rename from TYPO3 and/or Phoenix to Neos as needed
 */
class Version20121030221352 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("ALTER TABLE typo3_phoenixdemotypo3org_domain_model_registration RENAME TO typo3_neosdemotypo3org_domain_model_registration");
		$this->addSql("UPDATE typo3_neos_domain_model_site SET nodename = 'neosdemotypo3org', siteresourcespackagekey = 'TYPO3.NeosDemoTypo3Org' WHERE nodename = 'phoenixdemotypo3org'");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("ALTER TABLE typo3_neosdemotypo3org_domain_model_registration RENAME TO typo3_phoenixdemotypo3org_domain_model_registration");
		$this->addSql("UPDATE typo3_neos_domain_model_site SET nodename = 'phoenixdemotypo3org', siteresourcespackagekey = 'TYPO3.PhoenixDemoTypo3Org' WHERE nodename = 'neosdemotypo3org'");
	}
}

?>