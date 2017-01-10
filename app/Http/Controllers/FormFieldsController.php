<?php

namespace App\Http\Controllers;

class FormFieldsController extends Controller {

    public $rowDefaults = [];
    public $fieldDefaults = [];

    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->fieldDefaults = [
            'id'              => '',
            'type'            => 'text',
            'required'        => false,
            'label'           => '',
            'default'         => '',
            'container_class' => [],
            'placeholder'     => '',
            'label_class'     => [ 'float__label' ],
            'input_class'     => [ 'float__input' ]
        ];
        $this->rowDefaults   = [
            'row_class' => [],
            'return'    => false,
        ];
    }

    /*
     *
     */
    public function parseDefaultArgs( $args, $defaults = '' ) {
        if ( is_object( $args ) ) {
            $r = get_object_vars( $args );
        } elseif ( is_array( $args ) ) {
            $r =& $args;
        } else {
            parse_str( $args, $r );
        }

        if ( is_array( $defaults ) ) {
            return array_merge( $defaults, $r );
        }

        return $r;
    }

    public function formRow( $row ) {
        $args = $this->parseDefaultArgs( $row, $this->rowDefaults );

        $fields = '';

        if ( isset( $row['fields'] ) ) {
            foreach ( $row['fields'] as $id => $field ) {
                $fields .= $this->formField( $id, $field );
            }
        }

        if ( ! empty( $fields ) ) {
            $args_classes = ! is_array( $args['row_class'] ) ? [ $args['row_class'] ] : $args['row_class'];
            $row_class    = implode( ' ', $args_classes );
            $field        = sprintf( '<div class="form-row clearfix %1$s">%2$s</div>', $row_class, $fields );
        }

        if ( $args['return'] ) {
            return $field;
        } else {
            echo $field;
        }
    }

    /**
     * Build form fields.
     *
     * @param string $key
     * @param mixed $args
     *
     * @return string
     */
    public function formField( $key, $args ) {
        $args = $this->parseDefaultArgs( $args, $this->fieldDefaults );

        $field = '';
        $value = isset( $args['value'] ) ? $args['value'] : '';

        switch ( $args['type'] ) {
            case 'text' :
                $field .= '<input type="' . $args['type'] . '" class="' . implode( ' ', $args['input_class'] ) . '" name="' . $key . '" id="' . $key . '" ' . ' value="' . $value . '" />';
                break;
            case 'select' :
                $options = $field = '';

                if ( ! empty( $args['options'] ) ) {
                    foreach ( $args['options'] as $option_key => $option_text ) {
                        if ( '' === $option_key ) {
                            // If we have a blank option, select2 needs a placeholder
                            if ( empty( $args['placeholder'] ) ) {
                                $args['placeholder'] = $option_text ? $option_text : 'Choose an option';
                            }
                            $custom_attributes[] = 'data-allow_clear="true"';
                        }
                        $options .= '<option value="' . $option_key . '">' . $option_text . '</option>';
                    }

                    $field .= '<select name="' . $key . '" id="' . $key . '" class="select ' . implode( ' ', $args['input_class'] ) . '" data-placeholder="' . $args['placeholder'] . '">
							' . $options . '
						</select>';
                }
                break;
        }

        if ( ! empty( $field ) ) {
            $field_html = '';

            if ( $args['label'] && 'checkbox' !== $args['type'] ) {
                $field_html .= '<label for="' . $key . '" class="' . implode( ' ', $args['label_class'] ) . '">' . $args['label'] . '</label>';
            }
            $field_html .= $field;
            $args_classes    = ! is_array( $args['container_class'] ) ? [ $args['container_class'] ] : $args['container_class'];
            $container_class = implode( ' ', $args_classes );

            $field = sprintf( '<div class="%1$s">%2$s</div>', $container_class, $field_html );
        }

        return $field;
    }
}
