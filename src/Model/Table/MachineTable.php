<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Machine Model
 *
 * @property \App\Model\Table\StatusTable&\Cake\ORM\Association\BelongsTo $Status
 * @property \App\Model\Table\BrandTable&\Cake\ORM\Association\BelongsTo $Brand
 * @property \App\Model\Table\ModelTable&\Cake\ORM\Association\BelongsTo $Model
 * @property \App\Model\Table\OperativeSystemTable&\Cake\ORM\Association\BelongsTo $OperativeSystem
 * @property \App\Model\Table\GestaoSoftTable&\Cake\ORM\Association\HasMany $GestaoSoft
 *
 * @method \App\Model\Entity\Machine newEmptyEntity()
 * @method \App\Model\Entity\Machine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Machine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Machine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Machine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Machine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Machine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Machine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Machine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MachineTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('machine');
        $this->setDisplayField('serial_number');
        $this->setPrimaryKey('id');

        $this->belongsTo('Status', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Brand', [
            'foreignKey' => 'brand_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Model', [
            'foreignKey' => 'model_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('OperativeSystem', [
            'foreignKey' => 'operative_system_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('GestaoSoft', [
            'foreignKey' => 'machine_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('serial_number')
            ->maxLength('serial_number', 20)
            ->requirePresence('serial_number', 'create')
            ->notEmptyString('serial_number');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('status_id', 'Status'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn('brand_id', 'Brand'), ['errorField' => 'brand_id']);
        $rules->add($rules->existsIn('model_id', 'Model'), ['errorField' => 'model_id']);
        $rules->add($rules->existsIn('operative_system_id', 'OperativeSystem'), ['errorField' => 'operative_system_id']);

        return $rules;
    }
}
