<?php
class MicroController extends DrupalDefaultEntityController{

	public function create() {
		return (object) array(
			'mid' => '',
			'name' => '',
		);
	}

	public function save($micro) {

		$transaction = db_transaction();

		try {
			global $user;
			$micro->is_new = empty($micro->mid);
			$update_micro = TRUE;
			field_attach_presave('micro', $micro);

			if ($micro->is_new) {
				drupal_write_record('micro', $micro);
				$op = 'insert';
			}
			else {
				drupal_write_record('micro', $micro, 'mid');
				$op = 'update';
			}

			// Save fields.
			$function = 'field_attach_' . $op;
			$function('micro', $micro);
			module_invoke_all('entity_' . $op, $micro, 'micro');

			// Clear internal properties.
			unset($micro->is_new);

			db_ignore_slave();

			return $micro;
		}
		catch (Exception $e) {
			$transaction->rollback();
			watchdog_exception('micro', $e, NULL, WATCHDOG_ERROR);
			return FALSE;
		}
	}


	public function delete($mids) {
		if (!empty($mids)) {
			$micros = $this->load($mids, array());
			$transaction = db_transaction();
			try {
				db_delete('micro')
				->condition('mid', $mids, 'IN')
				->execute();

				foreach ($micros as $micro_id => $micro) {
					field_attach_delete('micro', $micro);
				}
				db_ignore_slave();
			}
			catch (Exception $e) {
				$transaction->rollback();
				watchdog_exception('micro', $e, NULL, WATCHDOG_ERROR);
				return FALSE;
			}
			module_invoke_all('entity_delete', $micro, 'micro');
			// Clear the page and block and micro caches.
			cache_clear_all();
			$this->resetCache();
		}

		return TRUE;
	}

}