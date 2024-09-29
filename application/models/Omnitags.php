<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Omnitags extends CI_Model
{
    // This model executes everything that needs to be handled universally
    // It's for simplicity

    // Retrieves all records from the tabel_b1 table in descending order of tabel_b1_field1
    public function get_all($table_name)
    {
        $id = $this->aliases[$table_name . '_field1'];
        $table_name = $this->aliases[$table_name];

        $this->db->where('deleted_at', NULL);
        $this->db->order_by($id, 'DESC');
        return $this->db->get($table_name);
    }



    public function get_all_archive($table_name)
    {
        $id = $this->aliases[$table_name . '_field1'];
        $table_name = $this->aliases[$table_name];

        $this->db->where('deleted_at IS NOT NULL');
        $this->db->order_by($id, 'DESC');
        return $this->db->get($table_name);
    }

    public function get_all_history($table_name)
    {
        $id = $this->aliases[$table_name . '_field1'];
        $table_name = $this->aliases[$table_name];

        $this->db->order_by('id_history', 'DESC');
        return $this->db->get($table_name . '_history');
    }

    public function get_by_field($table_name, $fields, $params)
    {
        $id = $this->aliases[$table_name . '_field1'];
        $table_name = $this->aliases[$table_name];

        if (is_array($fields) && is_array($params)) {
            foreach ($fields as $key => $field) {
                $param = $params[$key]; // Get the corresponding param value
                $this->db->where($this->aliases[$field], $param);
            }
        } else {
            $this->db->where($this->aliases[$fields], $params);
        }

        $this->db->where('deleted_at', NULL);
        $this->db->order_by($id, 'DESC');
        return $this->db->get($table_name);
    }

    public function get_by_field_archive($table_name, $fields, $params)
    {
        $id = $this->aliases[$table_name . '_field1'];
        $table_name = $this->aliases[$table_name];

        if (is_array($fields) && is_array($params)) {
            foreach ($fields as $key => $field) {
                $param = $params[$key]; // Get the corresponding param value
                $this->db->where($this->aliases[$field], $param);
            }
        } else {
            $this->db->where($this->aliases[$fields], $params);
        }

        $this->db->where('deleted_at IS NOT NULL');
        $this->db->order_by($id, 'DESC');
        return $this->db->get($table_name);
    }

    public function get_by_field_history($table_name, $fields, $params)
    {
        $id = $this->aliases[$table_name . '_field1'];
        $table_name = $this->aliases[$table_name];

        if (is_array($fields) && is_array($params)) {
            foreach ($fields as $key => $field) {
                $param = $params[$key]; // Get the corresponding param value
                $this->db->where($this->aliases[$field], $param);
            }
        } else {
            $this->db->where($this->aliases[$fields], $params);
        }

        $this->db->order_by('id_history', 'DESC');
        return $this->db->get($table_name . '_history');
    }

    public function get_by_id_history($table_name, $params)
    {
        $table_name = $this->aliases[$table_name];
        $this->db->where('id_history', $params);
        $this->db->order_by('id_history', 'DESC');
        return $this->db->get($table_name . '_history');
    }


    public function insert_history($table_name, $data)
    {
        $table_name = $this->aliases[$table_name];
        return $this->db->insert($table_name . '_history', $data);
    }

    public function insert($table_name, $data)
    {
        $table_name = $this->aliases[$table_name];
        return $this->db->insert($table_name, $data);
    }

    // Updates a record in the tabel_b1 table where tabel_b1_field1 equals $param1
    public function update($table_name, $data, $param1)
    {
        $id = $this->aliases[$table_name . '_field1'];
        $table_name = $this->aliases[$table_name];

        $this->db->where($id, $param1);
        return $this->db->update($table_name, $data);
    }

    // Updates all records in the tabel_b1 table
    public function update_all($table_name, $data)
    {
        $table_name = $this->aliases[$table_name];

        return $this->db->update($table_name, $data);
    }

    // Deletes a record from the tabel_b1 table where tabel_b1_field1 equals $param1
    public function delete_by_field($table_name, $fields, $params)
    {
        $table_name = $this->aliases[$table_name];

        if (is_array($fields) && is_array($params)) {
            foreach ($fields as $key => $field) {
                $param = $params[$key]; // Get the corresponding param value
                $this->db->where($this->aliases[$field], $param);
            }
        } else {
            $this->db->where($this->aliases[$fields], $params);
        }

        return $this->db->delete($table_name);
    }

    public function create_or_update_history_table($table_name)
    {
        $table_name = $this->aliases[$table_name];
        $history_table_name = "{$table_name}_history";

        // Load the database forge library
        $this->load->dbforge();

        // Get the structure of the original table
        $main_table_fields = $this->db->query("SHOW COLUMNS FROM {$table_name}")->result();
        if (empty($main_table_fields)) {
            return false;  // Main table doesn't exist
        }

        // Create or update the history table
        if (!$this->db->table_exists($history_table_name)) {
            $this->create_history_table($table_name);
        } else {
            $this->update_history_table($table_name);
        }

        // Add the trigger for inserting into the history table before updates
        $this->create_trigger_for_history($table_name);

        return true;
    }

    // Function to create the history table
    private function create_history_table($table_name)
    {
        $this->load->dbforge();

        // Get the structure of the main table again for creating the history table
        $main_table_fields = $this->db->query("SHOW COLUMNS FROM {$table_name}")->result();

        $history_fields = array();

        // Add the id_history field for the history table
        $history_fields['id_history'] = array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        );

        // Copy all fields from the original table, including the original primary key
        foreach ($main_table_fields as $field) {
            $history_fields[$field->Field] = array(
                'type' => $field->Type,
                'null' => ($field->Null === 'YES') ? TRUE : FALSE
            );
        }

        // Set primary key for the history table
        $this->dbforge->add_key('id_history', TRUE);

        // Create the history table
        $this->dbforge->add_field($history_fields);
        $this->dbforge->create_table("{$table_name}_history");
    }

    // Function to update the history table fields if they differ from the main table
    private function update_history_table($table_name)
    {
        $this->load->dbforge();
        $history_table_name = "{$table_name}_history";

        // Get the current structure of the history table
        $history_table_fields = $this->db->query("SHOW COLUMNS FROM {$history_table_name}")->result_array();
        $history_field_names = array_column($history_table_fields, 'Field');

        // Get the main table's field structure for comparison
        $main_table_fields = $this->db->query("SHOW COLUMNS FROM {$table_name}")->result_array();
        $main_field_names = array_column($main_table_fields, 'Field');

        // Create associative arrays for comparison
        $main_field_definitions = $this->get_field_definitions($main_table_fields);
        $history_field_definitions = $this->get_field_definitions($history_table_fields);

        // Add any missing fields from the main table to the history table
        foreach ($main_field_names as $field_name) {
            if (!in_array($field_name, $history_field_names)) {
                $this->dbforge->add_column($history_table_name, array($field_name => $main_field_definitions[$field_name]));
            }
        }

        // Modify any fields that differ between the main and history tables
        foreach ($main_field_names as $field_name) {
            if (isset($history_field_definitions[$field_name]) && $main_field_definitions[$field_name] !== $history_field_definitions[$field_name]) {
                $this->dbforge->modify_column($history_table_name, array($field_name => $main_field_definitions[$field_name]));
            }
        }

        // Drop any fields in the history table that are not present in the main table, except id_history
        foreach ($history_field_names as $field_name) {
            if (!in_array($field_name, $main_field_names) && strpos($field_name, 'id_history') === false) {
                $this->dbforge->drop_column($history_table_name, $field_name);
            }
        }
    }

    // Helper function to format field definitions for comparison
    private function get_field_definitions($fields)
    {
        $field_definitions = array();
        foreach ($fields as $field) {
            $field_name = is_object($field) ? $field->Field : $field['Field'];
            $type = is_object($field) ? $field->Type : $field['Type'];
            $null = is_object($field) ? $field->Null : $field['Null'];

            $field_definitions[$field_name] = array(
                'type' => $type,
                'null' => ($null === 'YES') ? TRUE : FALSE
            );
        }
        return $field_definitions;
    }

    // Function to create the trigger for maintaining history records
    private function create_trigger_for_history($table_name)
    {
        $trigger_name = "before_update_{$table_name}_history";
        $history_table_name = "{$table_name}_history";

        // Drop the existing trigger if it exists
        $this->db->query("DROP TRIGGER IF EXISTS {$trigger_name}");

        // Define the trigger to insert data into the history table before an update
        $trigger_sql = "
        CREATE TRIGGER {$trigger_name}
        BEFORE UPDATE ON {$table_name}
        FOR EACH ROW
        BEGIN
            INSERT INTO {$history_table_name} 
            SET 
                id_history = NULL,
                " . implode(", ", $this->get_trigger_field_mappings($table_name)) . ";
        END;
    ";

        // Execute the trigger creation query
        $this->db->query($trigger_sql);
    }

    // Helper function to map field names for the trigger
    private function get_trigger_field_mappings($table_name)
    {
        $fields = $this->db->query("SHOW COLUMNS FROM {$table_name}")->result();
        $field_mappings = [];

        foreach ($fields as $field) {
            if ($field->Field != 'id_history') {  // Exclude id_history field
                $field_mappings[] = "{$field->Field} = OLD.{$field->Field}";
            }
        }

        return $field_mappings;
    }

    public function get_with_joins($table_name, $joins = [], $fields = [], $params = [], $order_by = '', $order_direction = 'DESC')
    {
        // Build the main table alias and name
        $table_name = $this->aliases[$table_name];

        // Start building the query
        $this->db->from($table_name);

        // Loop through each JOIN definition
        if (!empty($joins)) {
            foreach ($joins as $join) {
                // Extract JOIN parameters
                $join_table = $this->aliases[$join['table']];
                $join_type = isset($join['type']) ? $join['type'] : 'INNER'; // Default is INNER JOIN
                $join_condition = "{$this->aliases[$join['table']]}.{$this->aliases[$join['field']]} = {$table_name}.{$this->aliases[$join['field']]}";

                // Apply the JOIN
                $this->db->join($join_table, $join_condition, $join_type);
            }
        }

        // Apply WHERE conditions
        if (is_array($fields) && is_array($params)) {
            foreach ($fields as $key => $field) {
                $param = $params[$key];
                $this->db->where($this->aliases[$field], $param);
            }
        } else {
            $this->db->where($this->aliases[$fields], $params);
        }

        // Order by specified field, defaulting to DESC
        if ($order_by) {
            $this->db->order_by($this->aliases[$order_by], $order_direction);
        } else {
            $this->db->order_by($this->aliases[$fields], 'DESC'); // Default to last field in fields array
        }

        // Return the result set
        return $this->db->get()->result();
    }

}

